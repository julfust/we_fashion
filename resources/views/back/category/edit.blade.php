@extends('layouts.master')

@section('content')

    <div class="w-full d-flex flex-column justify-content-start align-items-center py-5">
        
        <form action="{{ !$category ? route('categories.store') : route('categories.update', $category->id) }}" method="POST" class="w-50">
            @csrf
            @method(!$category ? 'POST' : 'PUT')

            <div class="row g-3">

                <div class="col-12">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $category ? old('title', $category->name) : '' }}">
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                
                <div class="col-12 d-flex justify-content-center align-items-start">
                    <button type="submit" class="btn btn-primary">{{ !$category ? 'Créer' : 'Modifier' }} la catégorie</button>
                </div>

            </div>
        </form>
    </div>

@endsection
