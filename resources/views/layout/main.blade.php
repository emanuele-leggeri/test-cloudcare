<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('the_title') - Main Site Title</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
        @if( Route::currentRouteName() != 'login' ) 
        <script type="text/javascript">
            let sessionItem = sessionStorage.getItem('auth-token');
            if( !sessionItem ) {
                window.location.href = '/login';
            } 
        </script>
        @endif
        @yield('additional_head')
    </head>
    <body>
        @yield('the_header')
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <div class="container">
                    <a class="navbar-brand text-white" href="/">Test CloudCare</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
                    <!--
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    -->
                    </div>
                </div>
            </nav>
        </header>
        <div id="main">
            @yield('the_content')
        </div>
        <footer class="container-fluid bg-dark text-white">
            <div class='container'>
                <div class='row'>
                    <div class='col'>
                        <span class="h1">Test CloudCare</span>
                    </div>
                    <div class='col'>
                        <span class="h3">Main Menu</span>
                        <ul>
                            <li>Item</li>
                            <li>Item</li>
                            <li>Item</li>
                            <li>Item</li>
                        </ul>
                    </div>
                    <div class='col'>
                        <span class="h3">Main Menu</span>
                        <ul>
                            <li>Item</li>
                            <li>Item</li>
                            <li>Item</li>
                            <li>Item</li>
                        </ul>
                    </div>
                    <div class='col'>
                        <span class="h3">Main Menu</span>
                        <ul>
                            <li>Item</li>
                            <li>Item</li>
                            <li>Item</li>
                            <li>Item</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        @yield('the_footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        @yield('scripts')        
    </body>
</html>