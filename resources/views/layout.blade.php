<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!--header-->
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Navbar</a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!--End-header-->
            <div class="col-12">
                <div class="row">
                    <div class="col-2">
                        @include('sidebar')
                    </div>
                    <div class="col-10">
                        @yield("contents")
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h2 class="text-center bg-secondary">Quyetnhph10607</h2>
            </div>
        </div>
    </div>
</body>

</html>