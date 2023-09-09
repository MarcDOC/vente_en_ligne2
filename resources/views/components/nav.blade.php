<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
</div>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
  
    
    {{-- @section('nav-bar') --}}
    
    <script src="js/bootstrap.bundle.js" defer></script>
    <script src="js/bootstrap.bundle.min.js" defer></script>
    <script src="js/bootstrap.esm.js" defer></script>
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Articles</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('article')}}">create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('affiche')}}">Article</a>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>
    {{-- @endsection --}}