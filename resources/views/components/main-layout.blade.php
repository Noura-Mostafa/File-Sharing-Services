<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('imgs/favicon.ico')}}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />

    <script>
        function copyText() {
            const text = document.getElementById('textToCopy').innerText;

            const tempInput = document.createElement('input');
            tempInput.type = 'text';
            tempInput.value = text;

            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

        }


        function updateNameInput() {
            const fileInput = document.getElementById('file');
            const nameInput = document.getElementById('title');
            const fileName = fileInput.files[0].name;
            nameInput.value = fileName;
        }

    </script>

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <h4 class="text-white">
                @if(Auth::user())
                Welcome {{Auth::user()->name}}
                @else
                <p class="text-white">Welcome to our <br> Website</p>
                @endif
            </h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-start">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('files.index')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('files.downloadedFiles')}}">Downloded</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Services</a></li>
                @if(Auth::user())
                <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="nav-link btn btn-primary">
                            {{ __('Logout') }}
                        </button>
                </form>
                </li>
                @else
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('login')}}">Login</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('register')}}">register</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container mt-5 pt-5">
    {{ $slot }}
    </div>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{asset('js/scripts.js')}}"></script>

</body>

</html>