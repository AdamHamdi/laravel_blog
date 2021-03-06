<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Acceuil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts') }}">Articles</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Compte
          </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @auth
                    <a class="dropdown-item" >{{ Auth::user()->name }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('users.logout') }}">Deconnexion</a>
                    @else
                    <a class="dropdown-item" href="{{ route('user.add') }}">Inscription</a>
                    <a class="dropdown-item" href="{{ route('users.login') }}">Connexion</a>
                    @endauth
                </div>
            </li>
            @auth
            {{--  seul l'admin peut ajouter un article  --}}
               {{--  @if(Auth::user()->is_admin)  --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestion des article
                        </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/posts/create') }}">Ajouter</a>

                            </div>
                        </li>
               {{--  @endif  --}}
            @endauth
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{ route('post.search') }}" method="post">
            {{ csrf_field() }}
            <input class="form-control mr-sm-2" type="search" name="search"  placeholder="Recherche" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
        </form>
    </div>
</nav>
