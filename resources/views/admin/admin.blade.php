<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    {{-- TOM SELECT IS HERE  --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script src="https://unpkg.com/htmx.org@1.9.0"></script>


    <title>@yield('title') | Administration</title>
    <style>
        @layer reset{
            button{
                all:unset;
            }
        }
        .htmx-indicator{
            display:none;
        }
        .htmx-request .htmx-indicator{
            display: inline-block;
        }
        .htmx-request.htmx-indicator{
            display: inline-block;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">The Agency</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @php
        $route = request()->route()->getName();
        @endphp
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('admin.property.index') }}" @class(['nav-link', 'active' => str_contains($route, 'property.')])>Properties Management</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.option.index') }}"  @class(['nav-link', 'active' => str_contains($route, 'option.')])>Options Management</a>
                </li>
            </ul>
            <div class="ms-auto">
                 @auth
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="nav-link">Disconnect</button>
                    </form>
                </li>
            </ul>
            @endauth
            </div>
           
        </div>
    </div>
</nav>



    <div class="container mt-5">
        @include('shared.flash')

        @yield('content')
    </div>
    <script>
        new TomSelect('select[multiple]')
    </script>
</body>
</html>