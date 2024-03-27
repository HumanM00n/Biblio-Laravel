@extends('layout.app')

@section('title', "page d'accueil")

@section('content')

    <div class="books">
        @foreach ($Livres as $Livre) 
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('uploads/'. $Livre->image) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $Livre->titre }}</h5>
                    <p class="card-text">{{ $Livre->annee_de_sortie }}</p>
                    <p class="card-text">{{ $Livre->auteur->prenom }}</p>
                <div class="d-flex justify-content-between ">
                    <a href="{{ route('details', ['id' => $Livre->id]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>

                    @Auth
                        @if (Auth::user()->type == "admin")
                            <a href="/modifier" class="btn btn-primary"><i class="fa-solid fa-pen"></i></a>
                        @endif
                     @endauth
                </div>
                
                </div>
            </div>
        @endforeach
    </div>

@endsection
