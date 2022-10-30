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
            <li><a href="/personalProfile"> Profile </a></li>
            <li><a href="/noticeBoard"> Notice Board </a></li>
            <li><a href="/settings"> Settings </a></li>

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
        <a href="/filter"> Only show active notices </a>

        @foreach($notices as $notice)

{{--                logged in user--}}

        @if($notice['user_id'] == auth()->user()->id)
                <section class="plan-notice">
                    <section >
                        <img src="/images/profilepic.png" alt="profile pic" id="profile-pic">
                    </section>
                    <p class="user">
                        You are looking for last minute plans!
                    </p>
                    <p class="notice-data">
                    When: <b>{{$notice['day_part_tags']}}</b> <br>
                    Location: <b>{{$notice['location']}}</b> <br>
                    From <b>{{$notice['from_time']}}</b> <br>
                    Until <b>{{$notice['until_time']}}</b> <br>
                    </p>
                    <section class="interaction-btn">
                    <button>Edit</button>
                    <button>Delete</button>
                    </section>
                </section>

            @else
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


{{--@if($notice['user_id'] == auth()->user()->id)--}}
    @unless(auth()->user()->user_plus == 1)
        <p>Want to make as many plans as you want? Go Plus!</p>

    @else
        <section >
            <footer class="sticky-footer">
                <section class="bottom-nav">
                    <a href="/createNotice"> + </a>
                </section>
            </footer>
        </section>
    @endunless
{{--@endif--}}


{{--@unless(auth()->user()->user_plus == 1)--}}
{{--@if($notice['user_id'] == auth()->user()->id)--}}
{{-- <p>Want to make as many plans as you want? Go Plus!</p>--}}
{{--@else--}}
{{--    <section >--}}
{{--        <footer class="sticky-footer">--}}
{{--            <section class="bottom-nav">--}}
{{--                <a href="/createNotice"> + </a>--}}
{{--            </section>--}}
{{--        </footer>--}}
{{--    </section>--}}
{{--@endif--}}
{{--@endunless--}}



</body>
</html>








