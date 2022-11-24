<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>ICTE | Login</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico"/>
    <link href="layouts/vertical-dark-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="layouts/vertical-dark-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="layouts/vertical-dark-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    <link href="layouts/vertical-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/light/authentication/auth-boxed.css" rel="stylesheet" type="text/css" />
    
    <link href="layouts/vertical-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/dark/authentication/auth-boxed.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
</head>
<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
    
            <div class="row">
    
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
    
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    
                                    <h2>Inicia Sesión</h2>
                                    <p>Ingrese su correo electrónico y contraseña para iniciar sesión                                    </p>
                                    
                                </div>
                                <x-jet-validation-errors class="mb-4" style="color:red"/>

                                <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="email" >Correo</label>
                                        <input type="email" class="form-control" name="email" :value="old('email')">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="password">Contraseña</label>
                                        <input type="password" class="form-control" id="password"  name="password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input me-3" type="checkbox" id="form-check-default">
                                            <label class="form-check-label" for="form-check-default" for="remember_me" id="remember_me" name="remember">
                                                Recordar Contraseña
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-secondary w-100">INGRESAR</button>
                                    </div>
                                </div>
                            </form>

                                
                                                            
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

    </div>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->


</body>
</html>