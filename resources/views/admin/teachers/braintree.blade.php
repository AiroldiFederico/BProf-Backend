@extends('layouts.app')

@section('title', 'Sponsorizza')

@section('content')
<div class="container">
    <h1 class="mb-3">Sponsorizza il tuo profilo</h1>
    <form method="post" id="payment-form" action="{{ url('/admin/payment/checkout') }}">
        @csrf
        <section>
            <div class="form-group">
                <select id="amount" name="amount" required class="form-control">
                    <option value="">scegli un piano</option>
                    @foreach ($sponsorships as $elem)
                        <option value="{{ $elem['price'] }}" data-price="{{ $elem['price'] }}" data-duration="{{ $elem['duration'] }}">{{ $elem['price'] }} € - {{ $elem['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div id="o24o" class="hidden text-uppercase bti">sponsorizza il tuo profilo per <span class="text-decoration-underline"> 24 ore </span> </div>
            <div id="o72o" class="hidden text-uppercase bti">sponsorizza il tuo profilo per <span class="text-decoration-underline"> 72 ore </span></div>
            <div id="o144o" class="hidden text-uppercase bti">sponsorizza il tuo profilo per <span class="text-decoration-underline"> 144 ore </span></div>

            <div class="bt-drop-in-wrapper">
                <div id="bt-dropin"></div>
            </div>
        </section>

        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <button class="btn_reg_no" type="submit"><span> SPONSORIZZA </span></button>
    </form>
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

// JavaScript to show/hide the hidden divs based on selected amount
document.getElementById('amount').addEventListener('change', function() {
    var selectedValue = parseFloat(this.value);

    // Reset visibility of all hidden divs
    var hiddenDivs = document.querySelectorAll('.hidden');
    hiddenDivs.forEach(function(div) {
        div.classList.remove('show');
    });

    // Show the appropriate hidden div based on the selected value
    if (selectedValue === 2.99) {
        document.getElementById('o24o').classList.add('show');
    } else if (selectedValue === 5.99) {
        document.getElementById('o72o').classList.add('show');
    } else if (selectedValue === 9.99) {
        document.getElementById('o144o').classList.add('show');
    }
});
</script>

<style>
.container {
    margin-top: 100px;
}

.hidden {
    display: none;
}

.show {
    display: block;
}


.btn_reg_no{
  border: 2px solid #89ce94;
  outline: none;
  padding: 9px 21px;
  border-radius: 32px;
  background: transparent;
  backdrop-filter: blur(10px);
  display: inline;
  align-items: center;
  cursor: pointer;
  transition: all 200ms ease;
  background-color: #89CE94!important;
  width: 100%;
}

.bti{
    background-color: #C4E7CA;
    padding: 9px 21px;
    justify-content: center;
    font-weight: bolder;
    margin-top: 1rem;
    margin-right: auto;
    margin-left: auto;
}

.braintree-sheet__content{
    display: flex;
    justify-content: center;
}
</style>

@endsection
