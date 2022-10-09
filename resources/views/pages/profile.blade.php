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
    <button> < </button>
    <header>
        <img src="" alt="profile pic"><br><br>
        <h1>{{$notice['name'] }}</h1>
        <nav>
            <ul>
                <li> Profile </li>
                <li> Memories </li>
                <li> Settings </li>
            </ul>
        </nav><hr>
    </header>

    <section class="plan-notice">
        <h2>
            {{$notice['name'] }} is looking for plans!
        </h2>
        <p>
            {{$notice['from_time']}} <br>
            {{$notice['until_time']}} <br>
            {{$notice['location']}} <br>
            {{$notice['day_part_tags']}} <br>
        </p>
    </section>
</main>

</body>
</html>
