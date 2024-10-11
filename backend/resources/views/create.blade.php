@extends('layout')
@section('contenu')
    <h1 class="">Ajouter Produit</h1>
    <form action="{{ route('produit.store') }}" method="post" class="form-group">
        @csrf
        <table class="table table-bordered">
            <tr>
                <td><label for="nom">Nom:</label></td>
                <td><input type="text" name="nom" id="nom" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="description">Description:</label></td>
                <td><input type="text" name="description" id="description" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="prix">Prix:</label></td>
                <td><input type="text" name="prix" id="prix" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="quantite">Quantite:</label></td>
                <td><input type="text" name="quantite" id="quantite" class="form-control"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" class="btn btn-primary" value="Add"></td>
            </tr>
        </table>
    </form>
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
@endsection
