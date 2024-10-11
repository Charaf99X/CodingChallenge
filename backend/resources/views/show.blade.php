@extends('layout')
@section('contenu')
    <h1>Showing {{ $produit->nom }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Nom:</strong> {{ $produit->nom }}<br>
            <strong>Description:</strong> {{ $produit->description }}<br>
            <strong>Prix:</strong> {{ $produit->prix }}<br>
            <strong>Quantite:</strong> {{ $produit->quantite }}
        </p>
    </div>
@endsection
