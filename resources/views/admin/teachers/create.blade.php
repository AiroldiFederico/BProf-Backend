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

                <form action="{{ route('teacher.store') }}" method="POST"  enctype="multipart/form-data">
                    
                    @csrf
                    


                    {{-- Numero di cellulare --}}
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Numero di cellulare</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror">
                    </div>
                    @error('phone_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                    {{-- Immagine di profilo--}}
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Immagine di profilo</label>
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control @error('image') is-invalid @enderror">
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div> 

                    {{-- CV--}}
                    <div class="mb-3">
                        <label for="cv" class="form-label">Aggiungi CV</label>
                        <input type="file" name="cv" id="cv" accept=".pdf" class="form-control @error('image') is-invalid @enderror">
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div> 

                    {{-- Descrizione teacher --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror">
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- Curriculum Vitae --}}
                    {{-- <div class="mb-3">
                        <label for="cv" class="form-label">Curriculum Vitae</label>
                        <input type="text" name="cv" id="cv" class="form-control @error('description') is-invalid @enderror">
                    </div>
                    @error('cv')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}

                    {{-- Prezzo --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo/h</label>
                        <input type="number" name="price" id="price" class="form-control @error('description') is-invalid @enderror">
                    </div>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- Materie --}}
                    <div class="mb-3">
                        <label for="subjects" class="form-label">Materie</label>
                        <select name="subjects[]" id="subjects" class="form-control" multiple="multiple">
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('subjects')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="remote" class="form-label">Possibilità lezione da remoto</label>
                        <input type="radio" name="remote" id="remote-yes" value="1">
                        <label for="remote-yes">Si</label>
                        <input type="radio" name="remote" id="remote-no" value="0" checked>
                        <label for="remote-no">No</label>
                    </div>
                    @error('remote')
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



