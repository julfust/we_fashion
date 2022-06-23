@extends('layouts.master')

@section('content')

    <div class="w-full d-flex flex-column justify-content-start align-items-center pt-4">
        
        <form action="{{route('products.update', $product->id)}}" method="POST" class="w-50">

            <div class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" id="title" class="form-control" value="{{(old('title', $product->title))}}">
                    @error('title')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <!-- <div class="form-group d-flex flex-column col-md-6 mb-4">
                    <img src="{{asset('/images/' . $product->picture->link)}}" alt="couverture livre">
                    <label for="avatar">Choisir une image:</label>
                    <input type="file" accept="image/png, image/jpeg">
                </div> -->

                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="3" style="resize: none;">{{(old('description', $product->description))}}</textarea>
                    @error('description')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="category" class="form-label">Catégorie</label>
                    <select id="category" class="form-select">
                        @forelse($categories as $category)
                            <option value="{{$category->name}}" {{$product->category->id === $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                        @empty
                            <p>Aucune categories disponibles actuellement</p>
                        @endforelse
                    </select>
                </div>

                <div class="col-12">
                    <p>Taille(s)</p>
                    @foreach($sizes as $size)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$size->id}}" id="{{$size->value}}" {{in_array($size->id, old('sizes', $checkedSizes)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{$size->value}}">{{$size->value}}</label>
                    </div>
                    @endforeach
                    @error('sizes')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="price" class="form-label">Prix</label>
                    <input type="number" id="price" class="form-control" max="10000" value="{{(old('price', $product->price))}}">
                    @error('title')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="productRef" class="form-label">Référence du produit</label>
                    <input type="text" id="productRef" class="form-control" value="{{(old('productRef', $product->productRef))}}">
                    @error('title')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="isPublished" {{ $product->isPublished ? 'checked' : '' }}>
                        <label class="form-check-label" for="isPublished" value="isPublished">
                            Publié sur le site
                        </label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="isPromoted" {{ $product->isPromoted ? 'checked' : '' }}>
                        <label class="form-check-label" for="isPromoted" value="isPromoted">
                            Mettre en promotion
                        </label>
                    </div>
                </div>
                
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Modifier le produit</button>
                </div>

            </div>
        </form>
    </div>

@endsection
