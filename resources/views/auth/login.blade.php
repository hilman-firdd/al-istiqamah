<!doctype html>
<html lang="en">

<head>
    <title>Hotel al-Istiqomah | Log in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <style>
        body {
            height: 100vh;
            overflow: hidden;
        }

        .background-img {
            background-image: url('img/bg.jpg') !important;
            background-size: cover;
            background background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
        }

        @media (min-width: 1280px) {
            .background-img {
                background-image: url('img/bg.jpg') !important;
                background-position: 0 -34rem !important;
                background-size: cover;
                background background-repeat: no-repeat;
                width: 100%;
                height: 100vh;
            }
        }
    </style>

</head>

<body class="img js-fullheight background-img">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4 text-center">
                    <div class="login-wrap p-0">
                        <img src="{{ asset('img/al-istiqomah.jpg')}}" class="rounded-sm mt-2" width="70" alt="">
                        <h3 class="mt-2 mb-4 text-center"><b>Hotel</b> Reservasi - Login</h3>
                        <form action="{{ route('login') }}" method="post" class="signin-form">
                            @csrf

                            <div class="form-group">
                                <input id="email" type="text" class="form-control{{ $errors->has('username
                        ') ? ' is-invalid' : '' }}" name="email" value="{{ old('username') }}" required autofocus
                                    placeholder="Username">
                                {{-- <input type="text" class="form-control" placeholder="Username" required> --}}
                                @if ($errors->has('username'))
                                <div class="alert" role="alert">
                                    <p>{{ $errors->first('username') }}</p>
                                    </span>
                                    @endif
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required placeholder="password">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <p>{{ $errors->first('password') }}</p>
                                </span>
                                @endif
                                {{-- <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span> --}}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign
                                    In</button>
                                <a href="{{ url('/') }}" style="padding-top:15px;"
                                    class="form-control btn btn-warning mt-2">Back</a>
                            </div>
                            <div class="form-group d-flex justify-content-around">
                                <div class="w-50 text-md-right">
                                    <a href="#" style="color: #f1eeeb">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                        {{-- <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span>
                                Facebook</a>
                            <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span>
                                Twitter</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/popper.js')}}"></script>
    <script src="{{ asset('js/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>

</body>

</html>