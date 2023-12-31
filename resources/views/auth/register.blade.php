@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <div class="card-body">
                    <form id="registration" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome*') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Città*') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                                {{-- <label class="col-md-12 col-form-label text-md-right text-muted label-form"> Inserisci il capoluogo di provincia più vicino a te! </label> --}}

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Via e numero civico*') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                {{-- <label class="col-md-12 col-form-label text-md-right text-muted label-form"> Inserisci il capoluogo di provincia più vicino a te! </label> --}}

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="cap" class="col-md-4 col-form-label text-md-right">{{ __('CAP*') }}</label>

                            <div class="col-md-6">
                                <input id="cap" type="text" class="form-control @error('cap') is-invalid @enderror" name="cap" value="{{ old('cap') }}" autocomplete="cap" autofocus>
                                {{-- <label class="col-md-12 col-form-label text-md-right text-muted label-form"> Inserisci il capoluogo di provincia più vicino a te! </label> --}}

                                @error('cap')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Materie --}}
                        <div class="mb-4 row">
                            <label for="subject" class="form-label col-md-4 col-form-label text-md-right">{{ __('Materia*') }}</label>

                            <div class="col-md-6">
                                <select name="subject" id="subject" required class="form-control @error('subject') is-invalid @enderror">
                                    <option value=""> Seleziona </option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo e-mail*') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="passwordconfirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control @error('passwordconfirm') is-invalid @enderror" name="password_confirmation" required minlength="8" autocomplete="new-password">
                                @error('passwordconfirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                                <span for="name" class="col-md-6 text-md-right campi ">I campi contrassegnati da * sono obblgatori.</span>
                            
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn_reg_no text-uppercase unisciti">
                                    {{ __('Unisciti') }}
                                </button>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $("#registration").validate({
                                    rules: {
                                        name: {
                                            required: true,
                                            minlength: 2,
                                            maxlength: 255,
                                            
                                        },
                                        surname: {
                                            required: true,
                                            minlength: 2,
                                            maxlength: 255,
                                            
                                        },
                                        city: {
                                            required: true,
                                            minlength: 3,
                                            maxlength: 255,
                                            
                                        },
                                        address: {
                                            required: true,
                                            minlength: 3,
                                            maxlength: 255,
                                            
                                        },
                                        cap: {
                                            required: true,
                                            min: (00000),
                                            max: (99999),
                                            
                                        },
                                        subject: {
                                            required: true,
                                        },
                                        email: {
                                            required: true,
                                            email: true
                                        },
                                        password: {
                                            required: true,
                                            minlength: 8
                                        }, 
                                        passwordconfirm: {
                                            required: true,
                                            minlength: 8
                                        }, 
                                    }
                                });
                            });
                        </script>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .container{
        position: relative;
        top: 90px;
        padding: 30px 0;
    }

    .campi{
        font-size: small!important;
        margin-top: 2rem!important;
    }

    .unisciti{
        background-color: #89CE94!important;
    }

    .btn_reg_no{
        border: 2px solid #89ce94;
        outline: none;
        padding: 7px 21px;
        border-radius: 32px;
        background: transparent;
        backdrop-filter: blur(10px);
        display: inline;
        align-items: center;
        cursor: pointer;
        transition: all 200ms ease;
    }

</style>