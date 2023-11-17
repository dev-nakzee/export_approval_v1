<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-default border">
        <div class="container-fluid px-4">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('frontend/images/logo.png')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">
                </a>
                <ul class="navbar-nav me-0 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>      
    <script src="{{asset('frontend/bootstrap/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
  </body>
</html>
