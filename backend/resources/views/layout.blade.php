<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les Produits</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('produit') }}">Produit</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ url('produit') }}">Afficher tout</a></li>
            <li><a href="{{ url('produit/create') }}">Create</a>
        </ul>
    </nav>
    <div class="container">
        @yield('contenu')
    </div>
</body>

</html>
