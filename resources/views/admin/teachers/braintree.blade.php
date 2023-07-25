@extends('layouts.app')

@section('content')

    <div class="py-12 boh">
        <div class="container d-flex justify-content-center">
            <form action="{{ route('admin.token') }}" method="post">
                @csrf
                {{-- <input type="text" id="price" name="price" placeholder="Price"> --}}
                {{-- <select id="price" class="@error('subjects') is-invalid @enderror">
                    @foreach ($sponsorhips as $sponsor)
                                <option value="{{ $sponsor->price }}"
                                    >{{ $sponsor->name }}</option>
                            @endforeach
                        </select> --}}

                <select id="price">
                    <option value="2.99">2.99 € - Bronze </option>
                    <option value="5.99">5.99 € - Silver </option>
                    <option value="9.99">9.99 € - Gold </option>
                </select>
                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
            </form>
        </div>
        <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
        <div style="display: flex;justify-content: center;align-items: center; color: white">
            <a id="submit-button" class="btn btn-sm btn-success" data-braintree-nonce>
                <span class="ml-3">Submit payment</span>
            </a>
        </div>
        <script>
    var button = document.querySelector('#submit-button');
    var priceInput = document.getElementById('price');
    var token = '{{$token}}';

    braintree.dropin.create({
        authorization: token,
        container: '#dropin-container'
    }, function (createErr, instance) {
        button.addEventListener('click', function () {
            instance.requestPaymentMethod(function (err, payload) {
                if (!err) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.token') }}",
                        data: {
                            nonce: payload.nonce,
                            price: priceInput.value,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (data) {
                            console.log('success', payload.nonce);
                        },
                        error: function (data) {
                            console.log('error', payload.nonce);
                        }
                    });
                }
            });
        });
    });
</script>

</div>
    

    
    
    
    
    
@endsection



<style>

    .boh {
        margin-top: 10rem;
    }

</style>


