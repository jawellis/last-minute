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
{{--<a href="/settings"> Settings </a>--}}

<header>
    <img src="/images/profilepic.png" alt="profile pic" class="profile-pic"><br><br>
    <h2>{{auth()->user()->name}}</h2>
    <nav>
        <ul class="nav-bar">
            <li><a href="/personalProfile"> Profile </a></li>
            <li><a href="/noticeBoard"> Notice Board </a></li>
            <li><a href="/settings"> Settings </a></li>
        </ul>
    </nav><hr>
</header>

<main>
@unless(count($notices) == 0)

    @foreach($notices as $notice)
        <section class="plan-notice">

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
                <button><a href="/noticeBoard/{{$notice->id}}/edit">Edit</a></button>
                <button>Delete</button>
            </section>
        </section>
    @endforeach

@else
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





