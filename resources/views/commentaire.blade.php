<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
        <title>Liste de tous les commentaires</title>
    </head> 
     <body>
        <center>
            <h1>Article N {{$article->id}} </h1>
        </center>
        <div class="container">
            @yield('content')
        </div>
    {{-- @section('content') --}}
            <center>
                <h2>Ajouter un commentaire</h2>
            </center>
    <div class="offset-3 col-md-6 well">
        <form action="{{route('savecomments')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="commentaire">Commentaire</label>
                <textarea name="commentaire" id="" cols="30" rows="10">un commentaire svp!</textarea>
            </div>
                <input type="hidden" class="form-control" name="article_id" id="" class="form-control" value="{{$article->id}}">
            <input type="submit"  class="btn btn-secondary">
        </form>
    </div>
</body>
</html>