<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login Vínculos</title>
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
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="{{url('DashboardAssets/images/redsoc.jpg')}}" alt="" height="60"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Ingrese su Email y contraseña para acceder al panel administrativo</p>
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Contraseña</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="checkbox-signin">Recuerdame</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Ingresar </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> 
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-white-50 ml-1">Olvidaste la contraseña?</a>
                                    @endif
                                </p>
                                @if (Route::has('register'))
                                <p class="text-white-50">No posees una cuenta?  <a href="{{ route('register') }}" class="text-white ml-1"><b>Registrate</b></a></p>
                                @endif
                            </div> <!-- end col -->
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
            Creado por <a class="text-white-50" href="https://github.com/luisdasilvads">Luis Da Silva </a><i class="mdi mdi-18px mdi-github-circle" ></i>
        </footer>

        <!-- Vendor js -->
        <script src="{{url('DashboardAssets/js/vendor.min.js')}}"></script>
        <!-- App js -->
        <script src="{{url('DashboardAssets/js/app.min.js')}}"></script>
        
    </body>
</html>