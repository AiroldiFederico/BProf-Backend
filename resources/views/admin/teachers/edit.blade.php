@extends('layouts.app')

@section('title', 'Modifica')

@section('content')

<div class="content">
    <div class="container px-3">

        <p class="d-none" id="demo"></p>

        {{-- CREATE --}}
        <div class="col-12 JobContainer mt-5">

            <div class="cardjob col-12">

                
                <h2 class="display-5 fw-bold">
                    Modifica il tuo profilo
                </h2>

                <form id="edit" action="{{ route('teacher.update', $teacher->id) }}" method="POST"  enctype="multipart/form-data">
                    
                    @csrf
                    @method('PUT')
                    
                    {{-- Numero di cellulare --}}
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Numero di cellulare*</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                        value="{{ $teacher->phone_number }}">
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    {{-- Città --}}
                    <div class="mb-2">
                        <label for="city">{{__('Città*')}}</label>
                        <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" id="city" autocomplete="city" value="{{ $teacher->city }}" required autofocus>
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- Via e numero civico --}}
                    <div class="mb-2">
                        <label for="address">{{__('Via e numero civico*')}}</label>
                        <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" autocomplete="address" value="{{ $teacher->address }}" required autofocus>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- CAP --}}
                    <div class="mb-2">
                        <label for="cap">{{__('CAP*')}}</label>
                        <input class="form-control @error('cap') is-invalid @enderror" type="text" name="cap" id="cap" autocomplete="cap" value="{{ $teacher->cap }}" required autofocus>
                        @error('cap')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                
                    {{-- Immagine di profilo --}}
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Immagine del profilo</label>
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control @error('profile_picture') is-invalid @enderror">
                        @error('profile_picture')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @if ($teacher->profile_picture != null)
                        <p class="mt-1 ms-5"> Foto profilo attuale: </p>
                        <img class="ms-5"  src="{{asset('storage/' . $teacher->profile_picture)}}" class="card-img-top" alt="" style="width:10%">
                        @else 
                        <p class="mt-1 ms-5"> Non hai ancora una foto profilo </p>
                        @endif
                    </div>
                    

                     {{-- CV --}}
                     <div class="mb-3">
                        <label for="cv" class="form-label">Aggiungi CV</label>
                        <input type="file" name="cv" id="cv" accept=".pdf" class="form-control @error('cv') is-invalid @enderror">
                        @error('cv')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @if ($teacher->cv != null)
                        <p class="mt-1 ms-5"> Hai già un Curriculum Vitae <a href="{{asset('storage/' . $teacher['cv'])}}" target="_blank"> (QUI) </a></p>
                        @else 
                        <p class="mt-1 ms-5"> Non hai ancora un Curriculum Vitae </p>
                        @endif
                    </div>
                    

                    {{-- Descrizione teacher --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione*</label>
                        <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                        value="{{ $teacher->description }}">
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                   
                    {{-- Prezzo --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo / ora*</label>
                        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
                        value="{{ $teacher->price }}">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    

                    {{-- Materie --}}
                    <div class="mb-3">
                        <label for="subjects" class="form-label">Materie*</label>
                        <select name="subjects[]" required id="subjects" class="form-control @error('subjects') is-invalid @enderror" multiple>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}"
                                    @foreach ($selectedSubjects as $elem)
                                        @if ($elem->id == $subject->id)
                                            selected
                                        @endif
                                    @endforeach
                                    >{{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('subjects')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    

                    <div class="mb-3">
                        <label for="remote" class="form-label">Possibilità lezione da remoto</label>
                        <input type="radio" name="remote" id="remote-yes" value="1" class="@error('remote') is-invalid @enderror" {{ old('remote', $teacher->remote) == 1 ? 'checked' : '' }}>
                        <label for="remote-yes">Si</label>
                        <input type="radio" name="remote" id="remote-no" value="0" class="@error('remote') is-invalid @enderror" {{ old('remote', $teacher->remote) == 0 ? 'checked' : '' }}>
                        <label for="remote-no">No</label>
                        @if ($teacher->remote != 0)
                            <p class="mt-1 ms-5"> Sei disponibile per lezioni da remoto </p>
                        @else
                            <p class="mt-1 ms-5"> Non sei disponibile per lezioni da remoto </p>
                        @endif
                        @error('remote')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <span for="name" class="col-md-6 text-md-right campi ">I campi contrassegnati da * sono obblgatori.</span>
                
                    <div class="d-flex justify-content-start mt-4">
                        <button type="submit" class="btn_reg_no">Modifica Inserzione</button>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $("#edit").validate({
                                rules: {
                                    phone_number: {
                                        required: true,
                                        minlength: 10,
                                        maxlength: 18,    
                                    },
                                    city: {
                                        required: true,
                                        minlength: 2,
                                        maxlength: 255,
                                    },
                                    address: {
                                        required: true,
                                        minlength: 5,
                                        maxlength: 255,   
                                    }, 
                                    cap: {
                                        required: true,
                                        min: (00000),
                                        max: (99999),
                                    },
                                    profile_picture: {
                                        required: false,
                                    },
                                    cv: {
                                        required: false,
                                    },
                                    description: {
                                        required: true,
                                        minlength: 3,
                                    },
                                    price: {
                                        required: true,
                                        minlength: 1,
                                        max: (99999999)
                                    },
                                
                                },
                                errorPlacement: function(error, element) {
                                    if (element.attr("name") == "subjects[]") {
                                        error.insertAfter($('#subjects').next('.select2-container'));
                                    } else {
                                        error.insertAfter(element);
                                    }
                                }
                            });
                        });
                    </script>
            









                </form>
                


            </div>

        </div>
    </div>
</div>

<script>

    document.getElementById("demo").innerHTML = 
    "The full URL of this page is:" + window.location.href;
    
    let url = document.getElementById("demo").innerHTML;
    let parts = url.split("/");
    
    let id = parts[4];
    
    if (id == {{ $teacher->id }}){
        
    } else {
        window.location.href = "{{ route('notallowed') }}";
    };
    
</script>

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
}
</style>

@endsection