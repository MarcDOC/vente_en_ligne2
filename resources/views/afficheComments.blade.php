
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tous les commentaires </title>
</head>
<body>
    @foreach ($commentaires as $commentaire )
    <ol>
        <li>{{$commentaire->commentaire}}</li>
    </ol>
@endforeach
</body>
</html>