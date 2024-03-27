<!DOCTYPE html>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>App Name - @yield('title')</title>
</head>
<body>
    @section('sidebar')
    <nav class="navbar navbar-expand-lg bg-body-tertiary w-100" >
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Bibliothèque</a>

            @guest {{-- SI L'UTILISATEUR N'EST PAS CONNECTE  --}} 
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 d-flex justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="/connexion">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/inscription">Inscription</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
                    
                @else {{-- SI L'UTILISATEUR EST PAS CONNECTE  --}} 

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 d-flex justify-content-end">
                        <li class="nav-item m">
                            <button class="btn btn-light">{{ Auth::user()->prenom }}</button>
                        </li>
                        @if (Auth::user()->type == "admin")
                            <li class="nav-item">
                                <a href="/ajout-livre" class="nav-link">Ajouter un livre</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <button class="btn btn-danger">Déconnexion</button>
                            </form>
                        </li>
                    </ul>
                </div>
                    
            @endguest
            
        </div>
    </nav>
    @show

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

