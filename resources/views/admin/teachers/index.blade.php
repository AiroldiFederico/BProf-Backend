@extends('layouts.app')

@section('content')
<div class="container">

  @if ($teacher != null)
  <div class="col-6 m-auto mt-2">

    
    <div class="card">

      <img src="{{asset('storage/' . $teacher->profile_picture)}}" class="card-img-top" alt="" width="90%">

      <div class="card-body">

        {{-- Nome --}}
        <h5 class="card-title">{{ $user->name }}</h5>

        {{-- CV --}}
        <div class="d-flex card-subtitle mb-2">
          <p class="me-1 fw-bold">Curriculum:</p>
          @if ($teacher->cv != null)
            <a href="{{asset('storage/' . $teacher['cv'])}}" target="_blank">Guarda il CV</a>
          @else
            <p>Non hai ancora un Curriculum Vitae</p>
          @endif
        </div>

        {{-- Descrizione --}}
        <div class="d-flex flex-column card-subtitle mb-2">
          <p class="fw-bold mb-0">Descrizione:</p>
          <p class="card-text">{{$teacher->description}}</p>
        </div>

        {{-- Prezzo --}}
        <div class="d-flex card-subtitle mb-2">
          <p class="me-1 fw-bold">Prezzo:</p>
          <p class="card-text">{{$teacher->price}} <span>&euro;/ora</span></p>
        </div>

        {{-- Materie --}}
        <div class="d-flex card-subtitle mb-2">
          <p class="me-1 fw-bold">Materie:</p>
          <p class="">{{ $teacher->subjects }}</p>
        </div>

        {{-- Remote --}}
        <div class="d-flex card-subtitle mb-2">
          <p class="me-1 fw-bold">Remoto:</p>
          @if ($teacher->remote != 0)
              Si
          @else
              No
          @endif
        </div>

        {{-- Cell --}}
        <div class="d-flex card-subtitle mb-2">
          <p class="me-1 fw-bold">Numero di telefono:</p>
          <p class="card-text"> {{$teacher->phone_number}}</p>
        </div>

        {{-- Bottone modifica --}}
        <a href="{{route('teacher.edit', $teacher->id)}}" class="btn bg-success-subtle border-success text-success">
          <i class="fa-solid fa-pencil"></i>
          Modifica il profilo
        </a>
        
        {{-- Delete --}}
        <button type="button" class="btn btn-danger bg-danger-subtle text-danger me-2" data-bs-toggle="modal" data-bs-target="#deletModal">
          <i class="fa-regular fa-trash-can"></i>
          Cancella
        </button>
        <div class="modal fade" id="deletModal" tabindex="-1" aria-labelledby="deletModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sei sicuro di voler eliminare il profilo?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="container d-flex text-center justify-content-center mt-3 mb-3">
                  <i class="fa-solid fa-triangle-exclamation text-danger fs-3"></i>
                </div>
                Se continui con l'eliminazione del profilo non potrai più tornare indietro
              </div>
              <div class="modal-footer justify-content-start">
                <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger bg-danger-subtle text-danger me-2">
                    <i class="fa-regular fa-trash-can"></i>
                    Delete
                  </button>
                </form>
                <button type="button" class="btn btn-secondary bg-secondary-subtle text-secondary me-2" data-bs-toggle="modal" data-bs-dismiss="modal">
                  <i class="fa-solid fa-xmark"></i>
                  Cancel
                </button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  @endif
</div>
@endsection