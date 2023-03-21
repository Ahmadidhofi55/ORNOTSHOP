<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>ORNOTSHOP | HOMEPAGE</title>
</head>
<body>
    @include('sweetalert::alert')

    <style>
        .bg-custom{
            background-color: #232946;
        }
    </style>
    <nav class="navbar navbar-expand-lg  bg-custom" >
        <div class="container">
          <a class="navbar-brand" href="#"><img src="favicon.svg" width="50px" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">kategori</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">produk</a>
              </li>
              <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-default btn-flat">{{ __('Logout')
                        }}</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <nav class="navbar navbar-expand-lg bg-custom">
        <div class="container">
          <a class="navbar-brand" href=""><img src="favicon.svg" width="50px" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Produk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">{{ auth()->user()->name }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-primary" href=""><i class="fa fa-user" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
