@extends('layouts.app')

@section ('title', "lien expiré")

@section('content')
    <p>{{ session('invalide') }}</p>

    <form action="{{ route('get-new-link') }}" method="post">
        <input type="mail" name="email" class="form-control">
        @scrf {{-- Protège des attaques scrf --}}

        <button>Send email</button>
    </form>
@endsection