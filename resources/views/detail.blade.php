{{-- @extends('commentaire') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <title>Detail de l article</title>
</head>
<body>
    @section('content')
    <div class="container">
        <x-nav/>
    </div>

    <table class="table">
        <thead>
            <tr class="table-warning">
                <th scope="col">Numero de l'article</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">prix</th>
                <th scope="col">user_id</th>
                <th scope="col">categorie</th>
                <th scope="col">Photo</th>
                {{-- <th scope="col">Update</th> --}}
                {{-- <th scope="col">Delete</th> --}}
            </tr>
        </thead>
        <tbody>
            <tr class="table-danger">
                <th>{{$article->id}}</th>
                <th>{{$article->titre}}</th>
                <th>{{$article->description}}</th>
                <th>{{$article->prix}}</th>
                <th>{{$article->user_id}}</th>
                <th>{{$article->categorie}}</th>
                <th><img src="{{asset('storage/' .$article->photo)}}" alt="image" width="100" height="100"></th>
                {{-- <th><a href="{{ route('update', ['id' => $article->id])  }}"><button class="btn btn-outline-success">Update</button></a></th> --}}
                {{-- <th><a href="{{ route('deleteArticle', ['id' => $article->id]) }}"><button class="btn btn-danger">Delete</button></a></th> --}}
                {{-- <th><a href="{{route('detail',['id'=>$article->id])}}"><button class="btn btn-primary">Detail</button></a></th> --}}
            </tr>
        </tbody>
    </table><br>
    <center>
        <h2>Ajouter un commentaire</h2>
    </center>
    <div class="offset-3 col-md-6 well">
        <form action="{{route('savecomments', ['id'=>$article->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                {{-- <input type="hidden" name="id" value="{{$commentaire->id}}"> --}}
                <label for="commentaire">Commentaire</label>
                <textarea name="commentaire" id="" cols="30" rows="10">un commentaire svp!</textarea>
            </div>
                <input type="hidden" class="form-control" name="article_id" id="" class="form-control" value="{{$article->id}}">
            <input type="submit"  class="btn btn-secondary">
        </form>
    </div>
    <div class="container">
        @foreach ($commentaire as $commentaire )
            content: {{$commentaire->commentaire}}
            <th><a href="{{ route('deleteComment', ['id' => $commentaire->id]) }}"><button class="btn btn-danger">Delete</button></a></th>
            <br><br>
        @endforeach
    </div>
</body>
</html>