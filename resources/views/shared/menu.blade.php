<nav style="background-color: #e6e9ed !important" class="navbar navbar-expand-lg mt-4">
    <div class="container-fluid">

        <a style="color: #66EB9A !important" class="navbar-brand fs-4 fw-semibold" href="{{!Auth::check() ? url('/') : '#'}}">We fashion</a>

        <div class="collapse navbar-collapse" id="navbarText">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-start align-items-center">

                @if(Auth::check())
                    <li class="nav-item ms-2">
                        <a class="nav-link active fs-5 text-muted" aria-current="page" href="{{url('/admin/products')}}">Produits</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link active fs-5 text-muted" aria-current="page" href="{{url('/admin/categories')}}">Catégories</a>
                    </li>
                @else
                    <li class="nav-item ms-4">
                        <a class="nav-link active fs-5 text-muted" aria-current="page" href="{{url('/products/promotion')}}">Soldes</a>
                    </li>
                    @if(isset($categories))
                        @forelse($categories as $id => $name)
                            <li class="nav-item ms-2">
                                <a class="nav-link active fs-5 text-muted" aria-current="page" href="{{url('/products', $name)}}">{{$name}}</a>
                            </li>
                        @empty
                            <li class="nav-item">Aucune categories pour l'instant</li>
                        @endforelse
                    @endif
                @endif
            </ul>

            <div class="d-flex justify-content-end align-items-start flex-fill">

                @if(Auth::check())
                    <a 
                        aria-current="page" 
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <button class="btn btn-outline-danger">Déconnexion</button>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                        {{ csrf_field() }}
                    </form>
                @else
                    <a aria-current="page" href="{{route('login')}}">
                        <button class="btn btn-outline-success">Connexion</button>
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
