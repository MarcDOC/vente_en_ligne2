<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <title>Document</title>
</head>
<body>
    <center>
        <h3>Add article</h3>
    </center>
    <div class="offset-3 col-md-6 well">
        <form action="{{route('updatearticle')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$article->id}}">
        <div class="form-group">
            <label for="titre">titre</label>
            <input type="text" name="titre" id="" class="form-control" class="form-control" value="{{$article->titre}}">
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <input type="text" name="description" id="" class="form-control" class="form-control" value="{{$article->description}}">
        </div>
        <div class="form-group">
            <label for="Prix">prix</label>
            <input type="number" name="prix" id="" class="form-control" class="form-control" value="{{$article->prix}}">
        </div>
        <div class="form-group">
            <label for="user_id">User_id</label>
            <input type="number" name="user_id" id="" class="form-control" class="form-control" value="{{$article->user_id}}">
        </div>
        <div class="form-group">
            <label for="photo">photo</label>
            <input type="file" name="photo" id="" class="form-control" class="form-control" value="{{$article->photo}}">
        </div>
        <div class="form-group">
            <label for="categorie">Categorie</label>
            <input type="text" name="categorie" id="" class="form-control" class="form-control" value="{{$article->categorie}}">
        </div>
        <button type="submit" class="btn btn-primary">Update article</button>
        </form>
    </div>
</body>
</html>
