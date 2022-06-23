@extends('layouts.master')

@section('content')

<div class="py-5">

    <h1>Tout les produits</h1>

    <div class="d-flex justify-content-center align-items-stretch flex-wrap pt-3 pb-5">
        
        @forelse($products as $product)

            <div class="card m-3" style="width: 18rem;">
                <img src="{{ asset($product->picture ? '/images/' . $product->picture->link : '/images/no_picture.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="{{url('product', $product->id)}}" class="btn btn-primary">Voir le détail</a>
                </div>
            </div>
        @empty
            <p>Aucun produit disponible actuellement</p>
        @endforelse
    </div>

    {{$products->links()}}
</div>

@endsection