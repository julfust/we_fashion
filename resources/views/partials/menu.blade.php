<nav style="background-color: #e6e9ed !important;" class="navbar navbar-expand-lg mt-4">
    <div class="container-fluid">

        <a style="color: #74d699; !important;" class="navbar-brand fs-4" href="{{Auth::check() ? url('/admin/products') : url('/')}}">We fashion</a>

        <div class="collapse navbar-collapse" id="navbarText">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active fs-4 text-muted" aria-current="page" href="#">Soldes</a>
                </li>

                @if(isset($categories))
                    @forelse($categories as $id => $name)
                        <li class="nav-item">
                            <a class="nav-link active fs-4 text-muted" aria-current="page" href="{{url('product', $name)}}">{{$name}}</a>
                        </li>
                    @empty
                        <li class="nav-item">Aucune categories pour l'instant</li>
                    @endforelse
                @endif

                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link active fs-4 text-muted" aria-current="page" href="{{route('products.index')}}">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a  class="nav-link active fs-4 text-muted"
                            aria-current="page"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link active fs-4 text-muted" aria-current="page" href="{{route('login')}}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
