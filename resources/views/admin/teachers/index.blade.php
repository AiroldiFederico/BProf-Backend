@extends('layouts.app')

@section('content')
<div class="container">

    @if ( Session::has('success') && $teacher == null)
            <script>
                setTimeout(function() {
                    document.querySelector('.alert').style.display = 'none';
                    window.location.href = "{{ url('admin') }}";
                }, 3000);
            </script>

            <div class="alert text-white font-weight-bold bg-success text-uppercase mb-5">
                {!! Session::get('success') !!}
            </div>
        @endif

        @if ( Session::has('success') && $teacher != null)
        <script>
            setTimeout(function() {
                document.querySelector('.alert').style.display = 'none';
            }, 3000);
        </script>

        <div class="alert text-white font-weight-bold bg-success text-uppercase mb-5">
            {!! Session::get('success') !!}
        </div>
    @endif

  @if ($teacher != null)


  <div class="m-auto mt-2 d-flex justify-content-center align-items-center h-100">

    {{-- CARD PROFILO --}}
    <div class="card-profile col-10 mt-5 px-4 py-4 row flex-column flex-lg-row">


      {{-- LEFT SIDE --}}
      <div class="col-12 col-lg-4 text-center d-flex flex-column align-items-center h-100 ls-card">

        <div class="img-card">
          @if ($teacher->profile_picture != null)
            <img src="{{asset('storage/' . $teacher->profile_picture)}}" class="img-pp" alt="" width="90%">
            @else
                
            @endif
        </div>
        
        <div class="d-flex mt-4">
          {{-- Nome --}}
          <h5 class="name-card">{{ $user->name }}</h5>
          <span>&nbsp </span>
          {{-- Cognome --}}
          <h5 class="surname-card">{{ $user->surname }}</h5>
        </div>

        {{-- Materie --}}
        <div class="d-flex card-subtitle mb-2">
          <p class="me-1 fw-bold">Materie:</p>
            @if (empty($teacher->subjects))
              <span >Non hai assegnato nessuna materia</span>
            @else
              @foreach ($teacher->subjects as $elem)
                <span class="subjects_label">{{ $elem->name }}<span class="dot_separator">&nbsp;•&nbsp;</span></span>
              @endforeach
            @endif
        </div>

      </div>

      {{-- RIGHT SIDE --}}
      <div class="col-12 col-lg-8 position-relative rs-card ">

        <div class="mb-2">
          <p class="title-right-card mb-0">INFORMAZIONI</p>
          <div class="line">

          </div>
        </div>

        {{-- TOP - RIGHT SIDE --}}
        <div class="top-right d-flex">
          
          <div class="d-flex flex-column me-5">

            {{-- Città --}}
            <div class="d-flex card-subtitle mb-2">
              <p class="me-1 fw-bold">Città:</p>
              <p class="card-text"> {{$teacher->city}}</p>
            </div>

            {{-- CAP --}}
            <div class="d-flex card-subtitle mb-2">
              <p class="me-1 fw-bold">CAP:</p>
              <p class="card-text"> {{$teacher->cap}}</p>
            </div>

          </div>

          <div class="d-flex flex-column">

            {{-- Indirizzo  --}}
            <div class="d-flex card-subtitle mb-2">
              <p class="me-1 fw-bold">Indirizzo:</p>
              <p class="card-text"> {{$teacher->address}}</p>
            </div>

            {{-- Cell --}}
            <div class="d-flex card-subtitle mb-2">
              <p class="me-1 fw-bold">Numero di telefono:</p>
              <p class="card-text"> {{$teacher->phone_number}}</p>
            </div>

          </div>

        </div>

        <div class="mb-2 mt-4">
          <p class="title-right-card mb-0">SERVIZIO</p>
          <div class="line">

          </div>
        </div>

        {{-- Descrizione --}}
        <div class="d-flex card-subtitle mb-2">
          <p class="me-1 fw-bold">Descrizione:</p>
          <p class="card-text"> {{$teacher->description}}</p>
        </div>

        <div class="d-flex gap-4">

          {{-- Prezzo --}}
          <div class="d-flex card-subtitle mb-2">
            <p class="me-1 fw-bold">Prezzo:</p>
            @if ($teacher->price == 0)
                Gratis
            @else
                {{$teacher->price}}
            @endif
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

        </div>

        {{-- CV --}}
        <div class="d-flex card-subtitle mb-5">
          <p class="me-1 fw-bold">Curriculum:</p>
          @if ($teacher->cv != null)
            <a href="{{asset('storage/' . $teacher['cv'])}}" target="_blank">Guarda il CV</a>
          @else
            <p>Non hai ancora un Curriculum Vitae</p>
          @endif
        </div>

        {{-- Button --}}
        <div class=" position-absolute bottom-0">
  
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
  
        </div>
      </div>

     














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
  @else
  <div class="alert alert-info mt-4">
    Non hai ancora creato il profilo. Per crearne uno <a class="fw-bold text-success" href="{{ route('teacher.create') }}">clicca QUI</a>
  </div>
  @endif
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      let subjectsLabels = document.querySelectorAll(".subjects_label");
      let lastSubjectLabel = subjectsLabels[subjectsLabels.length - 1];

      if (lastSubjectLabel) {
          let dotSeparator = lastSubjectLabel.querySelector(".dot_separator");
          if (dotSeparator) {
              dotSeparator.parentNode.removeChild(dotSeparator);
          }
      }

      let subjectCount = subjectsLabels.length;
      console.log("Numero di subjects:", subjectCount);
  });
</script>

<style>
  .container{
      position: relative;
      top: 90px;
      padding: 30px 0;
  }
</style>
@endsection