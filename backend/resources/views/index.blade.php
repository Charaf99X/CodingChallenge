@extends('layout')
@section('contenu')
    <h1 class="">Les Produits</h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nom</td>
                <td>Description</td>
                <td>Prix</td>
                <td>Quantite</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $pr)
                <tr>
                    <td>{{ $pr->id }}</td>
                    <td>{{ $pr->nom }}</td>
                    <td>{{ $pr->description }}</td>
                    <td>{{ $pr->prix }}</td>
                    <td>{{ $pr->quantite }}</td>
                    <td>
                        <a class="btn btn-small btn-success" href="{{ route('produit.show', $pr->id) }}">Show</a>
                        <a class="btn btn-small btn-info" href="{{ route('produit.edit', $pr->id) }}">Edit</a>
                        <form action="{{ route('produit.destroy', $pr->id) }}" method="post" class="btn">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-small btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
