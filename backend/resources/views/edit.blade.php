@extends('layout')
@section('contenu')
    <h1 class="">Midifier Produit {{ $produit->nom }}</h1>
    <form action="{{ route('produit.update', $produit->id) }}" method="post" class="form-group">
        @csrf
        @method('PUT')
        <table class="table table-bordered">
            <tr>
                <td><label for="nom">Nom:</label></td>
                <td><input type="text" name="nom" id="nom" class="form-control" value="{{ $produit->nom }}"></td>
            </tr>
            <tr>
                <td><label for="description">Description:</label></td>
                <td><input type="text" name="description" id="description" class="form-control"
                        value="{{ $produit->description }}"></td>
            </tr>
            <tr>
                <td><label for="prix">Prix:</label></td>
                <td><input type="text" name="prix" id="prix" class="form-control" value="{{ $produit->prix }}">
                </td>
            </tr>
            <tr>
                <td><label for="quantite">Quantite:</label></td>
                <td><input type="text" name="quantite" id="quantite" class="form-control"
                        value="{{ $produit->quantite }}"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" class="btn btn-primary" value="Edit"></td>
            </tr>
        </table>
    </form>
@endsection
