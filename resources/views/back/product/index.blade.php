@extends('layouts.master')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Publié</th>
                <th scope="col">Solde</th>
                <th scope="col">Référence</th>
                <th scope="col">Catégorie</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>
                    {{$product->title}}
                </td>
                <td>
                    {{$product->description}}
                </td>
                <td>
                    {{$product->price}}
                </td>
                <td>
                    {{$product->isPublished ? "✅" : "❌" }}
                </td>
                <td>
                    {{$product->isPromoted ? "✅" : "❌" }}
                </td>
                <td>
                    {{$product->productRef }}
                </td>
                <td>
                    {{$product->category->name }}
                </td>
                <td>
                    <p>STATUS TODO</p>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{url('admin/products', $product->id)}}">Détail</a>
                </td>
                <td>
                    <a class="btn btn-primary">Modifier</a>
                </td>
                <td>
                    <form action="{{route('products.destroy', $product->id)}}" method="POST">
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

    {{$products->links()}}
@endsection