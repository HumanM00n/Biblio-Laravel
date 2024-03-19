@extends('layout.app')

@section('title', 'Inscription')

@section('content')


    <div>
        <h1>Inscription</h1>
    </div>

    <form class="row g-3" action="/inscription" method="post">
        @csrf {{-- Pour se prémunire des attaques --}}

        {{-- NOM --}}
        <div class="col-md-6">
          <label for="labelNom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="inputNom" name="nom">
          <span>
            @error('nom')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </span>
        </div>

        {{-- PRENOM --}}
        <div class="col-md-6">
            <label for="labelPrenom" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="inputPrenom" name="prenom">
            <span>
                @error('prenom')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </span>
          </div>

        {{-- EMAIL --}}
        <div class="col-12">
          <label for="labelEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail" placeholder="exemple@gmail.com" name="email">
          <span>
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </span>
        </div>

        {{-- PASSWORD --}}
        <div class="col-md-6">
            <label for="labelPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password">
            <span>
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </span>
          </div>

        {{-- BUTTON --}}
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>

@endsection

