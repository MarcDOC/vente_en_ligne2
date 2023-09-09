
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <title>Creation d un article</title>
</head>
<body>
    <div class="container">
        <x-nav/>
    </div>
    <center>
        <h3>Add article</h3>
    </center>
    <div class="offset-3 col-md-6 well">
        <form action="{{route('savearticle')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
            <label for="titre">titre</label>
            <input type="text" class="form-control" name="titre" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <input type="text" class="form-control" name="description" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="Prix">prix</label>
            <input type="number" class="form-control" name="prix" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="categorie"> Categorie </label>
            <input type="text" class="form-control" name="categorie" id="" class="form-control">
        </div>
        {{-- <div class="form-group">
            <label for="user_id">user_id</label>
            <input type="number" class="form-control" name="user_id" id="user_id" class="form-control">
        </div> --}}
        <div class="form-group">
            <label for="photo">photo</label>
            <input type="file" class="form-control"  name="photo" id="" class="form-control">
        </div><br>
        <button type="submit" class="btn btn-primary">Add article</button>
        </form>
    </div> 
</body>
</html>
