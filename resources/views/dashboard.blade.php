<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="resto/assets/css/bootstrap.css">

    <link rel="stylesheet" href="resto/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="resto/assets/vendors/bootstrap-icons/bootstrap-icons.css">

    <link rel="stylesheet" href="resto/assets/css/app.css">
    <link rel="stylesheet" href="resto/assets/css/restau.css">
</head>

<body>
    <div class="container">
        <x-nav/>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>
    @foreach ($article as $art)
                    <div class="container">
                        Titre : {{$art->titre}} <br>
                        description : {{$art->description}} <br>
                        Categorie : {{$art->categorie}} <br>
                        price : {{$art->price}} <br>
                        photo : {{$art->photo}} <br>
                    </div>
                    @endforeach
    <script src="resto/assets/js/bootstrap.bundle.min.js"></script>
    <script src="resto/app/dashboard.js" type="module" defer></script>

</body>

</html>