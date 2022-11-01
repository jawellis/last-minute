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
{{--<a href="/settings"> Settings </a>--}}



<header>
    <h1 class="fake-logo">Last m1nute</h1><br>
    <h2>Notice board</h2>

    <nav>
        <ul class="nav-bar">
            <li><a href="/personalProfile"> Profile </a></li>
            <li><a href="/noticeBoard"> Notice Board </a></li>
{{--            <li><a href="/settings"> Settings </a></li>--}}

        </ul>
    </nav><hr>
</header>


<main>
    <h1>Latest notices</h1>

    <section class="search">
    <form action="/search" method="get" >
        <label for="search"></label>
        <input type="search" name="query" id="search">
        <button type="submit" name="search">
            Search
        </button>
    </form>
    </section>

    <form>
        <label for="sort_by"></label>
        <select name="sort_by" id="sort_by">
            <option> Select a day </option>
            <option value="all_days"> All days </option>
            <option value="Monday"> Monday </option>
            <option value="Tuesday"> Tuesday </option>
            <option value="Wednesday"> Wednesday </option>
            <option value="Thursday"> Thursday </option>
            <option value="Friday"> Friday </option>
            <option value="Saturday"> Saturday </option>
            <option value="Sunday"> Sunday </option>
        </select>
        <button><a href="/filter"> Filter </a></button>
    </form>



    @unless(count($notices) == 0)



        @foreach($notices as $notice)

{{--                logged in user--}}

        @if($notice['user_id'] == auth()->user()->id)
                <section class="plan-notice">
                    <section >
                        <img src="/images/profilepic.png" alt="profile pic" id="profile-pic">
                    </section>
                    <p class="user">
                        <b>You</b> are looking for last minute plans!
                    </p>
                    <p class="notice-data">
                    When: <b>{{$notice['day_part_tags']}}</b> <br>
                    Location: <b>{{$notice['location']}}</b> <br>
                    From <b>{{$notice['from_time']}}</b> <br>
                    Until <b>{{$notice['until_time']}}</b> <br>
                    </p>
                </section>

            @else
            {{--other users--}}
            <section class="plan-notice">
                <section >
                    <img src="/images/profilepic.png" alt="profile pic" id="profile-pic">
                </section>
                <p class="user">
                    <b><a href="/noticeBoard/{{$notice['id']}}" class="user-name">{{$notice['name']}} </a></b>
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
            @endif
        @endforeach


{{--pagination --}}
{{--    {{$notices->links()}}--}}
    @else
        <p> No new plan notices found</p>
        <p> Looking for last minute plans? </p>
        <section >
            <button><a href="/createNotice"> Create a new notice! </a></button>
        </section>
    @endunless

</main>


{{--            validation for userPlus--}}

@unless(auth()->user()->user_plus == 1)
    <section>
        <footer class="sticky-footer">
            <p>Want to make as many plans as you want? Go Plus!</p>
        </footer>
    </section>
@else
    <section >
        <footer class="sticky-footer">
            <section class="bottom-nav">
                <a href="/createNotice"> + </a>
            </section>
        </footer>
    </section>
@endunless

</body>
</html>








