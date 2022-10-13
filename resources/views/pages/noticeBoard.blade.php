<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/main.css" rel="stylesheet">
    <title>Last Minute</title>
</head>
<body>

<header>
    <h1 class="fake-logo">Last m1nute</h1><hr>
    <nav>
        <ul>
            <li><a href="/noticeBoard"> Notice Board </a></li>
            <li><a href="/noticeBoard"> Invitations </a></li>
            <li><a href="/profile"> Profile </a></li>
        </ul>
    </nav><hr>
</header>

<main>
    <h1>Latest notices</h1>
    <section class="search">
        <label>
            Search <input type="text">
        </label>
    </section>

    @unless(count($notices) == 0)
        @foreach($notices as $notice)
            <section class="plan-notice">
                <p class="user">
                    <b><a href="/noticeBoard/{{$notice['id']}}">{{$notice['name']}} </a></b>
                    is looking for last minute plans!
                </p>
                <p class="notice-data">
                    From <b>{{$notice['from_time']}}</b> <br>
                    Until <b>{{$notice['until_time']}}</b> <br>
                    In <b>{{$notice['location']}}</b> <br>
                    When: <b>{{$notice['day_part_tags']}}</b> <br>
                </p>
                <section class="interaction-btn">
                    <button>Make plans</button>
                    <button>Invite</button>
                    <button>Hide</button>
                </section>
            </section>
        @endforeach
    @else
        <p> No new plan notices found</p>
    @endunless

</main>

</body>
</html>








