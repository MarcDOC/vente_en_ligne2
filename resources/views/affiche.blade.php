<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <title>Tous les articles</title>
</head>
<body>
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
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
                <th scope="col">Detail</th> 
            </tr>
        </thead>
       
        <tbody>
            @foreach ($articles as $article )    
            <tr class="table-danger">
                <th>{{$article->id}}</th>
                <th>{{$article->titre}}</th>
                <th>{{$article->description}}</th>
                <th>{{$article->prix}}</th>
                <th>{{$article->user_id}}</th>
                <th>{{$article->categorie}}</th>
                <th><img src="{{asset('storage/' .$article->photo)}}" alt="image" width="100" height="100"></th>
                 <th><a href="{{ route('update', ['id' => $article->id])  }}"><button class="btn btn-outline-success">Update</button></a></th>
                <th><a href="{{ route('deleteArticle', ['id' => $article->id]) }}"><button class="btn btn-danger">Delete</button></a></th> 
                <th><a href="{{route('detail',['id'=>$article->id])}}"><button class="btn btn-primary">Detail</button></a></th> 
            </tr>
            @endforeach
        </tbody>    
    </table>
</body>
</html>

