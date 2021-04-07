<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.82.0">
  <title>Signin Template · Bootstrap v5.0</title>

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href=" {{ asset('assets/css/font-awesome.min.css') }} ">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href=" {{ asset('assets/css/style.css') }} " />

  @yield('Css')







  {{-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
  <!-- Bootstrap core CSS -->
  <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3"> --}}


  <style>
    /* .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;

    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    } */

  </style>

</head>

<body>

  <section class="mt-5">
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-5 mt-5 mx-auto">

          <form method="POST" action="{{ route('login') }}">

            @csrf

            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="row mb-3">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email">
              </div>
            </div>

            <div class="row mb-3">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" name="remember_me"> Remember me
              </label>
            </div>
            <input class="w-100 btn btn-lg btn-primary" type="submit" value="Sign in">
          </form>
        </div>
      </div>

      <div class="row my-3">
        <div class="col-md-5 mx-auto">
            @include('Admin.inc.errors')
        </div>
      </div>

      <div class="row">
        <div class="col-md-8 mx-auto text-center">
          <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>

        </div>
      </div>
    </div>

  </section>













  <!-- jQuery Plugins -->
  <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
