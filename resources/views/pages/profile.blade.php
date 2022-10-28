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
        <img src="/images/profilepic.png" alt="profile pic" class="profile-pic"><br><br>
        <h1>{{$notice['name'] }}</h1><hr>
        <nav>
            <ul>
                <li> Profile </li>
                <li> Settings </li>
            </ul>
        </nav><hr>
    </header>

<main>

    <section class="plan-notice">

        <h3>
            {{$notice['name'] }} is looking for plans!
        </h3>

        <p>
            On <b>{{$notice['day_part_tags']}}</b> <br>
            In <b>{{$notice['location']}}</b><br>
            From <b>{{$notice['from_time']}}</b> <br>
            Until <b>{{$notice['until_time']}}</b> <br>
        </p>

    </section>
</main>

</body>
</html>
