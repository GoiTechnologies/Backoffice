<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BackOffice Green Oceans Inc.</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e838e8d238.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha256-t9UJPrESBeG2ojKTIcFLPGF7nHi2vEc7f5A2KpH/UBU=" crossorigin="anonymous"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm fixed-top"
        style="background-color:#003366; color:#fff;">
            <div class="container">
                <a class="navbar-brand" style="color:#fff;" href="{{ url('/') }}">
                  <img src="{{URL::to('/') }}/logo01.png" style="margin-top:-10px;" width="140px" style="cursor:pointer;"/> BackOffice 
                </a>
                <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent"
                  aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span style="color:#fff;" class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest


                        <li class="nav-item">
                            <a class="nav-link" style="color:#fff; font-weight: bold;" id="saldo_gois"
                             href="#">Saldo (GOI`s): $0.00</a>
                        </li>

                            <li class="nav-item">
                                <a class="nav-link" style="color:#fff;"
                                 href="https://www.goicoindeveloper.com/backoffice/">Salir <i class="fas fa-sign-out-alt"></i></a>
                            </li>

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>




        <!-- Footer -->
<footer class="bg-light text-center text-lg-start">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Membresias Green Oceans INC</h5>

        <p>

          Cinco diferentes membresías que GOI tiene para sus usuarios, entre ellas:
          Estándar, premium, gold, empresarial y elite. Aquí podrás comprar tu membresía.<br>
          Disponibles en esta plataforma.

        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Plataformas</h5>

        <ul class="list-unstyled mb-0">
          <li>
            <a href="https://www.goicoindeveloper.com/goishop/" class="text-primary">Goishop</a>
          </li>
          <li>
            <a href="https://www.goicoindeveloper.com/job/" class="text-primary">Goilearn</a>
          </li>
          <li>
            <a href="https://www.goicoindeveloper.com/bet/login" class="text-primary">Goibet</a>
          </li>
          <li>
            <a href="https://www.goicoindeveloper.com/job/" class="text-primary">Goijob</a>
          </li>

        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">Recargar GOI`s</h5>

        <ul class="list-unstyled">
          <li>
            <a href="https://www.goicoindeveloper.com/paquetes_de_monedas" class="text-primary">Paquetes de Monedas</a>
          </li>
          <li>
            <a href="https://www.goicoindeveloper.com/" class="text-primary">Goicoin Center</a>
          </li>
          <li>
            <a href="https://www.goicoindeveloper.com/cajeros_mapa" class="text-primary">Cajeros Mapa</a>
          </li>
          <li>
            <a href="https://www.goicoindeveloper.com/paquetes_de_monedas" class="text-primary">Pago en Linea</a>
          </li>

        </ul>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2021 Copyright:
    <a class="text-dark" href="https://www.goicoindeveloper.com/">Green Oceans Inc.</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

    </div>
</body>
</html>
