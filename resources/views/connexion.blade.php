@extends ('layout.app')

@section ('title, "Connexion')

@section ('content')

<div class="container">
    <div>
        <h1>Connexion</h1>
    </div>

    <form class="row g-3 mt-2" action="/connexion" method="post">
        @csrf {{-- Pour se prémunire des attaques csrf --}}

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
          <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>
      </form>
</div>

@endsection