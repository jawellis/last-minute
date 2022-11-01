
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/main.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>



<main>
<section class="index-page">
    <header class="index-header">
        <h1 class="fake-logo">Last m1nute</h1>
    </header>
<!-- Right Side Of Navbar -->
<ul class="valLinks">
    @guest
        @if (Route::has('login'))
            <section class="valLinks" >
                <p>Already have an account? </p>
                <button><a  href="{{ route('login') }}">{{ __('Login') }}</a></button>
            </section><br>
        @endif

        @if (Route::has('register'))
                <section class="valLinks" >
                    <p>Don't have an account yet?</p>
                    <button><a  href="{{ route('register') }}">{{ __('Register') }}</a></button>
                </section><br>
        @endif
    @else
                <a  href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
    @endguest
</ul>
</section>
</main>
</body>
</html>
