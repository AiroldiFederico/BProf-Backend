@extends('layouts.app')

@section('title', 'Profilo')

@section('content')
<div class="container">

    @if ( Session::has('success') && $teacher == null)
            <script>
                setTimeout(function() {
                    document.querySelector('.banok').style.display = 'none';
                    window.location.href = "{{ url('admin') }}";
                }, 3000);
            </script>

            <div class="banok font-weight-bold text-uppercase mb-5 justify-content-center">
                {!! Session::get('success') !!}
            </div>
        @endif

        @if ( Session::has('success') && $teacher != null)
        <script>
            setTimeout(function() {
                document.querySelector('.banok').style.display = 'none';
            }, 3000);
        </script>

        <div class="banok font-weight-bold text-uppercase mb-5  justify-content-center">
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
        <div class="d-flex flex-column card-subtitle mb-2 col-12">
          <p class="mb-0 fw-bold">Materie:</p>
          <div class="d-flex col-12 justify-content-center">
            @if (empty($teacher->subjects))
              <span >Non hai assegnato nessuna materia</span>
            @else
              @foreach ($teacher->subjects as $elem)
                <div class="subjects_label">{{ $elem->name }} &nbsp;</div>
              @endforeach
            @endif
          </div>
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
        <div class="top-right d-flex flex-column flex-md-row">
          
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

        <div class="mb-2">
          <div class="line">

          </div>
        </div>

        {{-- Descrizione --}}
        <div class="d-flex card-subtitle mb-2">
          <p class="card-text"><span class="me-1 fw-bold">Descrizione:</span> {{$teacher->description}}</p>
        </div>

        <div class="d-flex gap-4">

          {{-- Prezzo --}}
          <div class="d-flex card-subtitle mb-2">
            <p class="me-1 fw-bold">Tariffa oraria:</p>
            @if ($teacher->price == 0)
                Gratis
            @else
                {{$teacher->price}} <span>&euro;</span>
            @endif
          </div>

          {{-- Remote --}}
          <div class="d-flex card-subtitle mb-2">
            <p class="me-1 fw-bold">Disponibile da remoto:</p>
            @if ($teacher->remote != 0)
                Si
            @else
                No
            @endif
          </div>

        </div>

        {{-- CV --}}
        <div class="d-flex card-subtitle ">
          <p class="me-1 fw-bold">CV:</p>
          @if ($teacher->cv != null)
            <a href="{{asset('storage/' . $teacher['cv'])}}" target="_blank" class="text-primary">Guarda il CV</a>
          @else
            <p>Non hai ancora un Curriculum Vitae</p>
          @endif
        </div>

        {{-- Button --}}
        <div class="d-flex flex-column flex-xl-row gap-2 m-auto align-items-center me-0 align-self-end">

          {{-- Bottone modifica --}}
          <a href="{{route('teacher.edit', $teacher->id)}}" class="btn btn_reg_no col-md-8 col-12 col-xl-4 flex-grow-1">
              <i class="fa-solid fa-pencil"></i>
              Modifica il profilo
          </a>

          {{-- Sponsor --}}
          <a href="{{route('admin.token')}}" class="btn btn_reg_spo col-md-8 col-12 col-xl-4 flex-grow-1">
              <i class="fa-regular fa-star"></i>
              Sponsorizza profilo
          </a>
          
          {{-- Delete --}}
          <button type="button" class="btn btn_reg_el col-md-8 col-12 col-xl-4 flex-grow-1" data-bs-toggle="modal" data-bs-target="#deletModal">
            <i class="fa-regular fa-trash-can"></i>
            Cancella
          </button>
          
        </div>

      </div>

     
      {{-- modal --}}

      <div class="modal fade" id="deletModal" tabindex="-1" aria-labelledby="deletModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header justify-content-center">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Sei sicuro di voler eliminare il profilo?</h1>
            </div>
            <div class="modal-footer justify-content-center">
              <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn_reg_el me-2">
                  <i class="fa-regular fa-trash-can"></i>
                  Delete
                </button>
              </form>
              <button type="button" class="btn_reg_can me-2" data-bs-toggle="modal" data-bs-dismiss="modal">
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
  <div class="banno mt-4">
    <div>
    Non hai ancora creato il profilo bProf. <a class="fw-bold text-success text-uppercase" href="{{ route('teacher.create') }}"> Crea profilo!</a>
    </div>
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

.modal{
  margin-top: 10rem;
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

.btn_reg_el{
  border: 2px solid rgb(225, 27, 27);
  outline: none;
  padding: 9px 21px;
  border-radius: 32px;
  background: transparent;
  backdrop-filter: blur(10px);
  display: inline;
  align-items: center;
  cursor: pointer;
  transition: all 200ms ease;
  background-color: rgb(225, 27, 27);
}

.btn_reg_spo{
  border: 2px solid rgb(240, 240, 75);
  outline: none;
  padding: 9px 21px;
  border-radius: 32px;
  background: transparent;
  backdrop-filter: blur(10px);
  display: inline;
  align-items: center;
  cursor: pointer;
  transition: all 200ms ease;
  background-color: rgb(240, 240, 75);
}

.btn_reg_spo:hover{
  background-color: rgb(240, 240, 75)
}

.btn_reg_el:hover{
  background-color: rgb(225, 27, 27)
}

.btn_reg_can{
  border: 2px solid rgb(146, 141, 141);
  outline: none;
  padding: 7px 21px;
  border-radius: 32px;
  background: transparent;
  backdrop-filter: blur(10px);
  display: inline;
  align-items: center;
  cursor: pointer;
  transition: all 200ms ease;
  background-color: rgb(146, 141, 141);
}

.banok{
  background-color: #89CE94;
  padding: 7px 21px;
  border-radius: 32px;
  border: 2px solid #89ce94;
  display: flex;
}

.banno{
  background-color: #89CE94;
  padding: 7px 21px;
  border-radius: 32px;
  border: 2px solid #89ce94;
}

</style>
@endsection