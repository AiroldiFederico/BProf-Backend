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
                
                    {{-- Titolo --}}
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Insert the title">
                    </div>
                    @error('phone_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                    {{--GitHub--}}
                    <div class="mb-3">
                        <label for="project-github" class="form-label">GitHub</label>
                        <input type="text" name="github" id="project-github" class="form-control @error('github') is-invalid @enderror" placeholder="Insert the GitHub link">
                    </div>
                    @error('github')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                    {{-- Link --}}
                    <div class="mb-3">
                        <label for="project-link" class="form-label">Link</label>
                        <input type="text" name="link" id="project-link" class="form-control @error('link') is-invalid @enderror" placeholder="Insert the project link (optional)">
                    </div>
                    @error('link')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                    {{-- Immagine --}}
                    <div class="mb-3">
                        <label for="project-image" class="form-label">Image</label>
                        <input type="file" name="image" id="project-image" class="form-control @error('image') is-invalid @enderror">
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                    {{-- Linguaggi --}}
                    {{-- <div class="mb-3">
                        <label for="project-languages" class="form-label">Languages</label>
                        <input type="text" name="languages" id="project-languages" class="form-control @error('languages') is-invalid @enderror" placeholder="Insert the programming languages">
                    </div>
                    @error('languages')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}

                    <div class="d-flex gap-3">
                        <div class="col-6 w-25">
                            {{-- Ciclo type --}}
                            <label for="project-types" class="form-label">Type</label>
                            <div class="input-group mb-3 w-75">
                                {{-- <label class="input-group-text" for="project-types">Types</label> --}}
                                <select class="form-select @error('type_id') is-invalid @enderror"" id="project-types" name="type_id">
        
                                    <option value="" selected> Scegli un tipo</option>
        
                                    {{-- @foreach ($types as $elem)    
                                        <option value="{{ $elem->id }}" > {{ $elem->name }} </option>
                                    @endforeach --}}
        
                                </select>
                            </div>
                            @error('type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="col-6">
                            {{-- Ciclo Technology --}}
                            <label for="technologies" class="mb-1">Programming languages</label>
                            <div class="form-group mt-1">
                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                    {{-- @foreach ($technologies as $technology)
                                        <input type="checkbox" class="btn-check" id="technology-{{ $technology->id }}" name="technologies[]" value="{{ $technology->id }}" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
    
    
                    </div> 

                
                    <div class="d-flex justify-content-start mt-4">
                        <button type="submit" class="btn btn-primary">Create Project</button>
                    </div>
                </form>
                


            </div>

        </div>
    </div>
</div>

    </div>

@endsection



