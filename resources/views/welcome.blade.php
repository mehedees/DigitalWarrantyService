<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Digital Warranty Service</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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
                color: #636b6f;
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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Digital Warranty Service
                </div>

                <div class="links">
                    <h3>Lookup Warranty</h3>
                    <form action="{{route('publicSearch')}}" method="POST">
                        @csrf
                        UID : <input type="text" name="uid" placeholder="Unique Warranty ID" class="form-control" required>
                        @if ($errors->has('uid'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('uid') }}</strong>
                            </span>
                        @endif
                        <br>
                        Phone No. : <input type="text" name="customer_phone" placeholder="Phone No Used to Purchase" class="form-control" required>
                        @if ($errors->has('customer_phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('customer_phone') }}</strong>
                            </span>
                        @endif
                        <br>
                        <input type="submit" value="Search" class="form-control btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
