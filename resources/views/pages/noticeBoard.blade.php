<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/main.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <title>Last Minute</title>
</head>
<body>
{{--<a href="/settings"> Settings </a>--}}

<header>
    <h1 class="fake-logo">Last m1nute</h1><br>
    <h2>Notice board</h2>
{{--    <h2>Notice board</h2>--}}

    <nav>
        <ul class="nav-bar">
            <li><a href="/personalProfile"> Profile </a></li>
            <li><a href="/noticeBoard"> Notice Board </a></li>
            <li><a href="/invitations"> Invitations </a></li>
            {{--            <li><a href="/settings"> Settings </a></li>--}}

        </ul>
    </nav><hr>
</header>

<main>
    <h1>Latest notices</h1>

{{--    search/filter--}}
    <form action="/noticeBoard" method="GET">
        <label>
            <input type="text" name="search" placeholder="Search by name, location, or day_part_tag">
        </label>
        <label>
            <select name="status">
                <option value="All">All</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </label>
        <button type="submit">Search</button>
    </form>



    @unless(count($notices) == 0)



        @foreach($notices as $notice)

{{--                logged in user--}}

        @if($notice['user_id'] == auth()->user()->id)

                <section class="plan-notice">
                    <section>
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
                    </p><br>
                    <form method="POST" action="/noticeBoard/{{ $notice->id }}/updateNoticeStatus">
                        @csrf
                        <input type="hidden" name="notice_id" value="{{ $notice->id }}">
                        <button type="submit" class="button">
                            {{ $notice->status ? 'Set inactive' : 'Set active'}}
                        </button>
                    </form>
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
                    @if($notice['status'] == 0)
                        <p> {{$notice['name']}} has her notice on hold </p>
                    @elseif(count(Auth::user()->notices()->get()) >= 2)
                        <button id="inviteButton" onclick="changeButtonText(); alert('You have invited them for plans')">Invite</button>{{--                    <button>Make plans</button>--}}
{{--                    <button>Invite</button>--}}
{{--                    <button>Hide</button>--}}
                    @endif
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

@include('layouts.footer')

</body>
</html>
<script>
    function changeButtonText() {
        document.getElementById("inviteButton").innerHTML = "Invited";
    }
</script>






