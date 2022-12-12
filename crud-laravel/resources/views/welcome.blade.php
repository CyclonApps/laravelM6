<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <nav class="row navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <div class="navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/home') }}" class="text-sm text-white underline me-3">Home</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="text-sm text-white underline me-3">Log in</a></li>

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="ml-4 text-sm text-white underline me-3">Register</a></li>
                            @endif
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row justify-content-center align-items-center vh-100 p-2 text-center text-white">
            <div class="col-4 border rounded">
                <div class="fs-2 fw-bold underline">Crud amb Laravel</div>
                <div class="fs-4 fw-bold">Pau Garcia Pascual</div>
                <div class="fs-5 fw-bold">M06 DAM2T</div>
            </div>
        </div>
    </body>
</html>
