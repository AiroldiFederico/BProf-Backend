@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container">

        {{-- CREATE --}}
        <div class="col-12 JobContainer mt-5">

            <div class="cardjob col-12">

                
                <h2 class="display-5 fw-bold">
                    Modifica il tuo profilo BProf!
                </h2>

                <form action="{{ route('teacher.update', $teacher->id) }}" method="POST"  enctype="multipart/form-data">
                    
                    @csrf
                    @method('PUT')
                    
                    {{-- Numero di cellulare --}}
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Numero di cellulare</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                        value="{{ $teacher->phone_number }}">
                    </div>
                    @error('phone_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- Città --}}
                    <div class="mb-2">
                        <label for="city">{{__('Città')}}</label>
                        <input class="form-control" type="text" name="city" id="city" autocomplete="city" value="{{ $teacher->city }}" required autofocus>
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->get('city')}}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- Via e numero civico --}}
                    <div class="mb-2">
                        <label for="address">{{__('Via e numero civico')}}</label>
                        <input class="form-control" type="text" name="address" id="address" autocomplete="address" value="{{ $teacher->address }}" required autofocus>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->get('address')}}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- CAP --}}
                    <div class="mb-2">
                        <label for="cap">{{__('CAP')}}</label>
                        <input class="form-control" type="text" name="cap" id="cap" autocomplete="cap" value="{{ $teacher->cap }}" required autofocus>
                        @error('cap')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->get('cap')}}</strong>
                        </span>
                        @enderror
                    </div>
                
                    {{-- Immagine di profilo --}}
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Immagine del profilo</label>
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control @error('image') is-invalid @enderror">
                        @if ($teacher->profile_picture != null)
                        <p class="mt-1 ms-5"> Foto profilo attuale: </p>
                        <img class="mt-1 ms-5"  src="{{asset('storage/' . $teacher->profile_picture)}}" class="card-img-top" alt="" style="width:10%">
                        @else 
                        <p class="mt-1 ms-5"> Non hai ancora una foto profilo </p>
                        @endif
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div> 

                     {{-- CV --}}
                     <div class="mb-3">
                        <label for="cv" class="form-label">Aggiungi CV</label>
                        <input type="file" name="cv" id="cv" accept=".pdf" class="form-control @error('image') is-invalid @enderror">
                        @if ($teacher->cv != null)
                        <p class="mt-1 ms-5"> Hai già un <a href="{{asset('storage/' . $teacher['cv'])}}" target="_blank">Curriculum Vitae.</a></p>
                        @else 
                        <p class="mt-1 ms-5"> Non hai ancora un Curriculum Vitae </p>
                        @endif
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div> 

                    {{-- Descrizione teacher --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                        value="{{ $teacher->description }}">
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- Curriculum Vitae --}}
                    {{-- <div class="mb-3">
                        <label for="cv" class="form-label">Curriculum Vitae</label>
                        <input type="text" name="cv" id="cv" class="form-control @error('description') is-invalid @enderror"
                        value="{{ $teacher->cv }}">
                    </div>
                    @error('cv')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}

                    {{-- Prezzo --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo/h</label>
                        <input type="number" name="price" id="price" class="form-control @error('description') is-invalid @enderror"
                        value="{{ $teacher->price }}">
                    </div>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- Materie --}}
                    <div class="mb-3">
                        <label for="subjects" class="form-label">Materie</label>
                        <select name="subjects[]" id="subjects" class="form-control @error('subjects') is-invalid @enderror" multiple>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->slug }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('subjects')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="remote" class="form-label">Possibilità lezione da remoto</label>
                        <input type="radio" name="remote" id="remote-yes" value="1" {{ old('remote', $teacher->remote) == 1 ? 'checked' : '' }}>
                        <label for="remote-yes">Si</label>
                        <input type="radio" name="remote" id="remote-no" value="0" {{ old('remote', $teacher->remote) == 0 ? 'checked' : '' }}>
                        <label for="remote-no">No</label>
                        @if ($teacher->remote != 0)
                            <p class="mt-1 ms-5"> Sei disponibile per lezioni da remoto </p>
                        @else
                            <p class="mt-1 ms-5"> Non sei disponibile per lezioni da remoto </p>
                        @endif
                    </div>
                    @error('remote')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                    <div class="d-flex justify-content-start mt-4">
                        <button type="submit" class="btn btn-primary">Modifica Inserzione</button>
                    </div>
                </form>
                


            </div>

        </div>
    </div>
</div>

    </div>

@endsection