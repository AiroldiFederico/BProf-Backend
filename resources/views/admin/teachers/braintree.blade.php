@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" id="payment-form" action="{{ url('/admin/payment/checkout') }}">
        @csrf
        <section>
            <select id="amount" name="amount" required>
                    <option value="">Seleziona un piano</option>
                @foreach ($sponsorships as $elem)
                    <option value="{{ $elem['price'] }}" data-price="{{ $elem['price'] }}" data-duration="{{ $elem['duration'] }}">{{ $elem['price'] }} € - {{ $elem['name'] }}</option>
                @endforeach
            </select>

            <div id="24o" class="hidden">sponsorizza il tuo profilo per 24 ore</div>
            <div id="72o" class="hidden">sponsorizza il tuo profilo per 72 ore</div>
            <div id="144o" class="hidden">sponsorizza il tuo profilo per 144 ore</div>

            <div class="bt-drop-in-wrapper">
                <div id="bt-dropin"></div>
            </div>
        </section>

        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <button class="button" type="submit"><span>Test Transaction</span></button>
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
        document.getElementById('24o').classList.add('show');
    } else if (selectedValue === 5.99) {
        document.getElementById('72o').classList.add('show');
    } else if (selectedValue === 9.99) {
        document.getElementById('144o').classList.add('show');
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
</style>

@endsection
