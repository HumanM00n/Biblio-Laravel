@extends('layout.app')

@section('title', "Ajouter un livre")

@section('content')
    <div class="container">
        <h1>Ajouter un livre</h1>

        @if (session('error'))
            <p>{{ session('error')}}</p>
        @endif

        <form class="row g-3" action="/ajout-livre" method="post" enctype="multipart/form-data">
            @csrf {{-- Pour se prémunire des attaques --}}
    
            {{-- TITRE --}}
            <div class="mb-3">
              <label for="" class="form-label">Titre</label>
              <input type="text" class="form-control" id="titre" name="titre">
            </div>
    
            {{-- ANNEE DE SORTIE --}}
            <div class="mb-3">
                <label for="" class="form-label">Année de sortie</label>
                <input type="date" class="form-control" name="date">
                <span>
            </div>
    
            {{-- IMAGE --}}
            <div class="mb-3">
              <label for="" class="form-label">Photo ouverte</label>
              <input type="file" class="form-control" id=""  name="photo">
              <span>
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </span>
            </div>
    
            {{-- AUTEUR --}}
            <div class="mb-3">
                <select class="form-select form-select-lg mb-3" name="auteur" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ($auteurs as $auteur)
                        <option value="{{$auteur->id}}">{{$auteur->prenom}} {{$auteur->nom}}</option>                        
                    @endforeach
                  </select>
            </div>

            {{-- BUTTON --}}
            <div class="mb-3">
                <button type="submit" class="btn btn-outline-info">Ajouter</button>
            </div>
          </form>
    </div>

@endsection