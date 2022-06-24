@extends('layouts.master')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="w-100 d-flex justify-content-end align-items-start py-3">
        <a aria-current="page" href="{{route('categories.create')}}">
            <button class="btn btn-outline-primary">Nouveau</button>
        </a>
    </div>

    <div class="d-flex justify-content-center align-items-start">
        <table class="w-50 table table-striped">
            <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('categories.edit', $category->id)}}">Modifier</a>
                    </td>
                    <td>
                        <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <div>
                    <p>Aucun produits</p>
                </div>
            @endforelse
            </tbody>
        </table>
    </div> 

    {{$categories->links()}}
@endsection