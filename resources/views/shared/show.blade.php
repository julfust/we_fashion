@extends('layouts.master')

@section('content')

<div class="d-flex justify-content-center align-items-stretch flex-wrap py-5">

    <div class="d-flex flex-column justify-content-start align-items-center product-infos-ctnr">

        <div class="d-flex justify-content-center align-items-start mb-4">

            <div class="w-50">
                <img src="{{ asset($product->picture ? '/images/' . $product->picture->link : '/images/no_picture.png') }}" class="w-100" alt="" />
            </div>

            <div class="w-50 ms-4">

                <h2 class="mb-4">{{ $product->title }}</h2>

                <div class="d-flex flex-column justify-content-start align-items-start">

                    <label for="size-select" class="mb-2">Choisir la taille:</label>

                    <select name="size" id="size-select" class="w-50 mb-4 product-size-select">
                        @forelse($product->sizes as $size)
                            <option value="{{$size->value}}">{{$size->value}}</option>
                        @empty
                            <p>Aucune taille disponible pour ce produit</p>
                        @endforelse
                    </select>
                </div>

                @if(!Auth::check())
                    <button type="button" class="btn btn-primary">Acheter</button>
                @endif
            </div>
        </div>

        <p class="fs-4">{{ $product->description }}</p>
    </div>
</div>

@endsection