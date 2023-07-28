@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" id="payment-form" action="{{ url('/admin/payment/checkout') }}">
        @csrf
        <section>
            <select id="amount" name="amount">
                @foreach ($sponsorships as $elem)
                    <option value="{{ $elem['price'] }}" data-price="{{ $elem['price'] }}" data-duration="{{ $elem['duration'] }}">{{ $elem['price'] }} € - {{ $elem['name'] }}</option>
                @endforeach
            </select>

            <div class="bt-drop-in-wrapper">
                <div id="bt-dropin"></div>
            </div>
        </section>

        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <button class="button" type="submit"><span>Test Transaction</span></button>
    </form>
</div>
</div>

<script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
<script>
var form = document.querySelector('#payment-form');
var client_token = "{{ $token }}";

braintree.dropin.create({
authorization: client_token,
selector: '#bt-dropin'
}, function (createErr, instance) {
if (createErr) {
console.log('Create Error', createErr);
return;
}
form.addEventListener('submit', function (event) {
event.preventDefault();

instance.requestPaymentMethod(function (err, payload) {
  if (err) {
    console.log('Request Payment Method Error', err);
    return;
  }

  // Add the nonce to the form and submit
  document.querySelector('#nonce').value = payload.nonce;
  form.submit();
});
});
});
</script>

<style>
    .container{
        margin-top: 100px
    }
</style>

@endsection


