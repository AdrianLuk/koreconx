<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KoreConX Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .nav-link, .navbar-brand{
                color: black !important;
                font-weight: normal;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: black;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

    @include('partials.navbar')
        <div class="flex-center position-ref full-height">
            

            <div class="content">
                <div class="container">
                    @guest                    
                    <div class="title m-b-md">
                        <h1>Welcome to the Share Purchase System</h1>
                    </div>
                    <p class="lead text-center">Please <a href="{{ route('login') }}">log in</a> to continue</p>
                    @else
                    <div class="title m-b-md">
                        Welcome back {{Auth::user()->first_name}}
                        <h2>Get started below</h2>
                    </div>
                    <div class="row justify-content-center m-0">
                    <a class="btn btn-warning mx-2" href="{{ route('shares.create') }}">Purchase Shares</a>
                    <a class="btn btn-info mx-2" href="{{ route('shares.index') }}">View Shares</a>
                    <a class="btn btn-success mx-2" href="/account">View Account</a>
                </div>
                    @endguest
                </div>
            </div>
        </div>
    </body>
</html>
