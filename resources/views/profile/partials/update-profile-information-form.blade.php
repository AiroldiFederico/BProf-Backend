
<section>
    <header>
        <h2 class="text-secondary">
            {{ __('Il tuo profilo') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __("Aggiorna le informazioni del tuo profilo.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form id="profile" method="post" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-2">
            <label for="name">{{__('Nome*')}}</label>
            <input class="form-control" type="text" name="name" id="name" autocomplete="name" value="{{old('name', $user->name)}}" required autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->get('name')}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="surname">{{__('Cognome*')}}</label>
            <input class="form-control" type="text" name="surname" id="surname" autocomplete="surname" value="{{old('surname', $user->surname)}}" required autofocus>
            @error('surname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->get('surname')}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="city">{{__('Città*')}}</label>
            <input class="form-control" type="text" name="city" id="city" autocomplete="city" value="{{old('city', $user->city)}}" required autofocus>
            @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->get('city')}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="address">{{__('Via e numero civico*')}}</label>
            <input class="form-control" type="text" name="address" id="address" autocomplete="address" value="{{old('address', $user->address)}}" required autofocus>
            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->get('address')}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="cap">{{__('CAP*')}}</label>
            <input class="form-control" type="text" name="cap" id="cap" autocomplete="cap" value="{{old('cap', $user->cap)}}" required autofocus>
            @error('cap')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->get('cap')}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="email">
                {{__('Indirizzo e-mail*') }}
            </label>

            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email)}}" required autocomplete="username" />

            @error('email')
            <span class="alert alert-danger mt-2" role="alert">
                <strong>{{ $errors->get('email')}}</strong>
            </span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-muted">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="btn_reg_no">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 text-success">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <span for="name" class="col-md-6 text-md-right campi">I campi contrassegnati da * sono obblgatori.</span>

        <div class="d-flex align-items-center gap-4">
            <button class="btn_reg_no mt-2" type="submit">{{ __('Salva') }}</button>

            @if (session('status') === 'profile-updated')
            <script>
                const show = true;
                setTimeout(() => show = false, 2000)
                const el = document.getElementById('profile-status')
                if (show) {
                    el.style.display = 'block';
                }
            </script>
            <p id='profile-status' class="fs-5 text-muted">{{ __('Informazioni aggiornate con successo!') }}</p>
            @endif
        </div>

        <script>
            $(document).ready(function() {
                $("#profile").validate({
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
                            max: (97100)
                            
                        },
                        subject: {
                            required: true,
                            minlength: 3,
                            maxlength: 255,
                            
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 8
                        }
                    }
                });
            });
        </script>


    </form>
</section>
<style>

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
        background-color: #89CE94!important;
    }

    .campi{
        font-size: small!important;
        margin-top: 2rem!important;
    }

   .container{
        margin-top: 6rem 
    }


</style>
