@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container">

        {{-- CREATE --}}
        <div class="col-12 JobContainer mt-5">

            <div class="cardjob col-12">

                
                <h2 class="display-5 fw-bold">
                    Crea il tuo profilo BProf!
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
                
                    {{-- Immagine di profilo--}}
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Immagine di profilo</label>
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control @error('image') is-invalid @enderror"
                        value="{{ $teacher->profile_picture }}">
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
                    <div class="mb-3">
                        <label for="cv" class="form-label">Curriculum Vitae</label>
                        <input type="text" name="cv" id="cv" class="form-control @error('description') is-invalid @enderror"
                        value="{{ $teacher->cv }}">
                    </div>
                    @error('cv')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- Prezzo --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo/h</label>
                        <input type="number" name="price" id="price" class="form-control @error('description') is-invalid @enderror"
                        value="{{ $teacher->price }}">
                    </div>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                
                    <div class="d-flex justify-content-start mt-4">
                        <button type="submit" class="btn btn-primary">Crea Inserzione</button>
                    </div>
                </form>
                


            </div>

        </div>
    </div>
</div>

    </div>

@endsection