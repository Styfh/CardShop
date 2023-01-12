<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    {{-- Master style --}}
    <style>
        *{
            padding: 0;
            margin: 0;
        }

        nav{
            background-color: yellow;
            display: flex;
            flex-direction: row;
        }

        .left-nav{
            margin-left: 5rem;
        }

        .right-nav{
            display:flex;
            margin-right: 5rem;
        }

        .right-nav a{
            color: black;
            text-decoration: none;
        }

        main{
            background: #EAEAEA;
            min-height: 100vh;
        }

        .login, .register{
            border: 3px solid black;
            border-radius: 15px;
            padding: 0 0.5rem;
        }

        .login a, .register a{
            text-transform: uppercase;
        }


    </style>

    {{-- Style of individual pages --}}
    @yield('style')

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-light fixed-top" style="background-color: #EBEF18;">
        <div class="left-nav">
            <strong>
                <a class="navbar-brand" href="/">CardShop</a>
            </strong>
        </div>

        <div class="right-nav">
            <div class="mx-2">
                <a href="/cart">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </a>
            </div>

            <div class="mx-2">
                <a href="/search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </a>
            </div>

            @auth
            <div class="dropdown mx-2">
                <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="/profile/{{ Auth::id() }}">Your Profile</a></li>
                    <li><a class="dropdown-item" href="/listings/{{ Auth::id() }}">Your Listings</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
            @endauth

            @guest
            <div class="mx-2">
                <strong>
                    <a href="/login">Login</a>
                </strong>
            </div>

            <div class="mx-2">
                <strong>
                    <a href="/register">Register</a>
                </strong>
            </div>
            @endguest

        </div>
    </nav>

    {{-- Yield page content --}}
    <main>
        @yield('content')
    </main>


</body>
</html>
