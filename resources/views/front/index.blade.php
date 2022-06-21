@extends('layouts.master')

@section('content')

<h1>Tout les produits</h1>

{{$products->links()}}

<div class="d-flex justify-content-center align-items-stretch flex-wrap py-3">
    
    @forelse($products as $product)

            <div class="card m-3" style="width: 18rem;">
                <img src="{{asset('/images/' . $product->picture->link)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
    @empty
        <p>Aucun produit disponible actuellement</p>
    @endforelse
</div>
@endsection