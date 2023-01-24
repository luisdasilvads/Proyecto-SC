<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Registro Vínculos RedSoc</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{url('DashboardAssets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('DashboardAssets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('DashboardAssets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
 

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="text-center w-75 m-auto">
                                            <a href="index.html">
                                                <span><img src="{{url('DashboardAssets/images/redsoc.jpg')}}" alt="" height="60"></span>
                                            </a>
                                            <p class="text-muted mb-4 mt-3">Ingrese </p>
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Nombre Completo</label>
                                            <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" id="name" value="{{ old('name') }}" placeholder="Ingresa tu nombre completo" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="emailaddress">Correo Electrónico</label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" required placeholder="Ingresa tu correo electrónico" name="email" value="{{ old('email') }}" autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Confirmar Contraseña</label>
                                            <input class="form-control" type="password" id="password-confirm" placeholder="Confirma tu contraseña" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-info btn-block" type="submit"> Registrarse </button>
                                        </div>
                                        
                                </form>    
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            @if (Route::has('login'))
                            <div class="col-12 text-center">
                                <p class="text-white-50">Ya tienes una cuenta?  <a href="{{ route('login') }}" class="text-white ml-1"><b>Iniciar Sesión</b></a></p>
                            </div> <!-- end col -->
                            @endif
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            Creado por <a class="text-white" href="https://github.com/luisdasilvads">Luis Da Silva </a><i class="mdi mdi-18px mdi-github-circle" ></i>
        </footer>

        <!-- Vendor js -->
        <script src="{{url('DashboardAssets/js/vendor.min.js')}}"></script>
        <!-- App js -->
        <script src="{{url('DashboardAssets/js/app.min.js')}}"></script>
        
    </body>
</html>