@extends('layouts.master')

@section('content')

    <div class="w-full d-flex flex-column justify-content-start align-items-center py-5">
        
        <form action="{{ !$product ? route('products.store') : route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="w-50">
            @csrf
            @method(!$product ? 'POST' : 'PUT')

            <div class="row g-3">

                <div class="col-12 d-flex flex-column justify-content-start align-items-center">
                    <label for="picture" class="form-label mb-3">Image</label>
                    @if(old('picture', $productPictureLink))
                        <img src="{{asset('/images/' . $product->picture->link)}}" alt="" style="width: 25rem !important" class="mb-4">
                    @endif
                    <input class="form-control" type="file" id="picture" name="picture" />
                    @error('picture')
                        <div class="w-100 alert alert-danger mt-3" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $product ? old('title', $product->title) : old('title') }}">
                    @error('title')
                        <div class="alert alert-danger mt-3" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" style="resize: none">{{ $product ? old('description', $product->description) : old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger mt-3" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="category" class="form-label">Cat??gorie</label>
                    <select id="category" name="category_id" class="form-select">
                        @if(!$productCategoryId)
                            <option value="" disabled selected>Veuillez s??lectionner une cat??gorie</option>
                        @endif
                        @forelse($categories as $category)
                            @if($productCategoryId)
                                <option value="{{$category->id}}" {{ $productCategoryId === $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                            @endif
                        @empty
                            <p>Aucune categories disponibles actuellement</p>
                        @endforelse
                    </select>
                </div>

                <div class="col-12">
                    <p>Taille(s)</p>
                    @foreach($sizes as $size)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$size->id}}" id="{{$size->value}}" name="sizes[]" {{ in_array($size->id, old('sizes', $checkedSizes)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{$size->value}}">{{$size->value}}</label>
                    </div>
                    @endforeach
                </div>

                <div class="col-12">
                    <label for="price" class="form-label">Prix</label>
                    <input type="number" id="price" name="price" step="0.01" class="form-control" value="{{ $product ? old('price', $product->price) : old('price') }}">
                    @error('price')
                        <div class="alert alert-danger mt-3" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="productRef" class="form-label">R??f??rence du produit</label>
                    <input type="text" id="productRef" name="productRef" class="form-control" value="{{ $product ? old('productRef', $product->productRef) : old('productRef') }}">
                    @error('productRef')
                        <div class="alert alert-danger mt-3" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <p>Publier sur le site</p>
                    <div class="form-check">
                        @if($product)
                            <input class="form-check-input" type="radio" id="isPublished" name="isPublished" value="1" {{ $isPublished ? 'checked' : '' }}>
                        @else
                            <input class="form-check-input" type="radio" id="isPublished" name="isPublished" value="1" {{ old('isPublished') ? 'checked' : '' }}>
                        @endif
                            <label class="form-check-label" for="isPublished">Oui</label>
                    </div>
                    <div class="form-check">
                        @if($product)
                            <input class="form-check-input" type="radio" id="isPublished" name="isPublished" value="1" {{ !$isPublished ? 'checked' : '' }}>
                        @else
                            <input class="form-check-input" type="radio" id="isPublished" name="isPublished" value="1" {{ !old('isPublished') ? 'checked' : '' }}>
                        @endif
                        <label class="form-check-label" for="isPublished">Non</label>
                    </div>
                </div>

                <div class="col-12">
                    <p>Mettre en promotion</p>
                    <div class="form-check">
                        @if($product)
                            <input class="form-check-input" type="radio" id="isPromoted" name="isPromoted" value="1" {{ $isPromoted ? 'checked' : '' }}>
                        @else
                            <input class="form-check-input" type="radio" id="isPromoted" name="isPromoted" value="1" {{ old('isPromoted') ? 'checked' : '' }}>
                        @endif
                        <label class="form-check-label" for="isPublished">Oui</label>
                    </div>
                    <div class="form-check">
                        @if($product)
                            <input class="form-check-input" type="radio" id="isPromoted" name="isPromoted" value="1" {{ !$isPromoted ? 'checked' : '' }}>
                        @else
                            <input class="form-check-input" type="radio" id="isPromoted" name="isPromoted" value="1" {{ !old('isPromoted') ? 'checked' : '' }}>
                        @endif
                        <label class="form-check-label" for="isPublished">Non</label>
                    </div>
                </div>
                
                <div class="col-12 d-flex justify-content-center align-items-start">
                    <button type="submit" class="btn btn-primary">{{ !$product ? 'Cr??er' : 'Modifier' }} le produit</button>
                </div>

            </div>
        </form>
    </div>

@endsection
