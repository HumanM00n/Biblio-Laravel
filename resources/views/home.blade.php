@extends('layout.app')

@section('title', "page d'accueil")

@section('content')

    <div class="d-flex m-1">
        @foreach ($Livres as $Livre) 
            <div class="card" style="width: 18rem;">
                <img src="{{ $Livre->image }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $Livre->titre }}</h5>
                    <p class="card-text">{{ $Livre->anne_de_sortie }}</p>
                    <p class="card-text">{{ $Livre->auteur->prenom }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
