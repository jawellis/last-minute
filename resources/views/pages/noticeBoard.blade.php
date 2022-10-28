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

@auth
<header>
    <h1 class="fake-logo">Last m1nute</h1><hr>
    <nav>
        <ul>
            <li><a href="/noticeBoard"> Notice Board </a></li>
            <li><a href="/authUserProfile"> Profile </a></li>
            <li><a href="/noticeBoard"> Settings </a></li>
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


{{--    <label for="filter"> Filter </label>--}}
{{--    <select name="filter-options" id="filter">--}}
{{--        <option value="active">active</option>--}}
{{--        <option value="day">day</option>--}}
{{--        <option value="time">time</option>--}}
{{--        <option value="none">none</option>--}}
{{--    </select>--}}

    @unless(count($notices) == 0)
        <a href="/filter"> Only show active notices </a>
        @foreach($notices as $notice)
            <section class="plan-notice">
                <section >
                    <img src="/images/profilepic.png" alt="profile pic" id="profile-pic">
                </section>

{{--                logged in user--}}
                <p class="user">
                    <b><a href="/authUserProfile">You {{auth()->user()}}</a></b>
                    are looking for last minute plans!
                </p>
                <p class="notice-data">
                    When: <b>{{$notice['day_part_tags']}}</b> <br>
                    Location: <b>{{$notice['location']}}</b> <br>
                    From <b>{{$notice['from_time']}}</b> <br>
                    Until <b>{{$notice['until_time']}}</b> <br>
                </p>
                <section class="interaction-btn">
                    <button>Make plans</button>
                    <button>Invite</button>
                    <button>Hide</button>
                </section>

            </section>

            {{--other users--}}
            <section class="plan-notice">
                <section >
                    <img src="/images/profilepic.png" alt="profile pic" id="profile-pic">
                </section>
                <p class="user">
                    <b><a href="/noticeBoard/{{$notice['id']}}">{{$notice['name']}} </a></b>
                    is looking for last minute plans!
                </p>
                <p class="notice-data">
                    When: <b>{{$notice['day_part_tags']}}</b> <br>
                    Location: <b>{{$notice['location']}}</b> <br>
                    From <b>{{$notice['from_time']}}</b> <br>
                    Until <b>{{$notice['until_time']}}</b> <br>
                </p>
                <section class="interaction-btn">
                    <button>Make plans</button>
                    <button>Invite</button>
                    <button>Hide</button>
                </section>
            </section>
        @endforeach
{{--pagination --}}
{{--    {{$notices->links()}}--}}
    @else
        <p> No new plan notices found</p>
    @endunless

</main>
<footer class="sticky-footer">
    <section class="bottom-nav">
        <a href="/createNotice"> + </a>
    </section>
</footer>

@else
    <a href="/" class="back-btn"> < </a>
    <p> error </p>

@endauth
</body>
</html>








