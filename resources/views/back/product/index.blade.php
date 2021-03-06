@extends('layouts.master')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="w-100 d-flex justify-content-end align-items-start py-3">
        <a aria-current="page" href="{{route('products.create')}}">
            <button class="btn btn-outline-primary">Nouveau</button>
        </a>
    </div>

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
                <td class="{{ !$product->category ? 'text-danger fw-bold' : '' }}">
                    {{ $product->category ? $product->category->name : "non définie" }}
                </td>
                <td>
                    <a class="btn btn-primary" href="{{url('admin/products', $product->id)}}">Détail</a>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{route('products.edit', $product->id)}}">Modifier</a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="{{ '#exampleModal-' . $loop->index }}">Supprimer</button>
                </td>
            </tr>

            <div class="modal fade" id="{{ 'exampleModal-' . $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Suppression d'un produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Etes-vous sûre de vouloir supprimer le produit: "{{$product->title}}" ?
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <form action="{{route('products.destroy', $product->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        @empty
            <div>
                <p>Aucun produits</p>
            </div>
        @endforelse
        </tbody>
    </table>

    {{$products->links()}}
@endsection