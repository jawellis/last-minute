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
<a href="/noticeBoard" class="back-btn"> < </a>

<header>
    <h2 class="fake-logo">Settings</h2><hr>
{{--    <nav>--}}
{{--        <ul>--}}
{{--            <li><a href="/personalProfile"> Profile </a></li>--}}
{{--            <li><a href="/noticeBoard"> Notice Board </a></li>--}}
{{--            <li><a href="/settings"> Settings </a></li>--}}

{{--        </ul>--}}
{{--    </nav><hr>--}}
</header>

<main>
    <section id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                        @guest
                            @if (Route::has('login'))
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                        @endguest

        </nav>
        <section>
            <form method="POST" action="/settings/updateUserPlus">
                @csrf
                <button type="submit" class="button">
                    {{ \App\Models\User::find(Auth::id())->user_plus ? 'Unsubscribe for User+' : 'Subscribe for User+'}}
                </button>
            </form>
        </section>
    </section>
</main>

</body>



</html>

