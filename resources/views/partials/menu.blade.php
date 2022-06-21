<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="btn btn-primary" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar">
                    <a class="btn btn-primary" href="{{url('/')}}">Accueil</a>
                </span>
            </button>
            <span class="icon-bar"><a href="./product/solde">Soldes</a></span>
            @if(isset($categories))
                @forelse($categories as $id => $name)
                    <span class="icon-bar"><a href="{{url('product', $name)}}">{{$name}}</a></span>
                @empty
                    <li>Aucune categorie pour l'instant</li>
                @endforelse
            @endif
        </div>
    </div>
</nav>
