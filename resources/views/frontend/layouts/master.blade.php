<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  </head>
  <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('frontend/images/logo.png')}}" alt="" height="70" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll float-end" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Industry Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Join Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>        
        <script src="{{asset('frontend/js/jquery.min.js')}}"></script>   
        <script src="{{asset('frontend/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>
