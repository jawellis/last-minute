
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/main.css" rel="stylesheet">
    <title>Create notice</title>
</head>
<body>
<a href="/personalProfile" class="back-btn"> < </a>
<header>
    <h1> Create notice </h1>
</header>


<main>
    @if((auth()->user()->user_plus == 1) || (count(Auth::user()->notices()->get()) <= 1))
    <section class="plan-notice">
    <form method="POST" action="/noticeBoard">
        @csrf

        <label for="name"> </label>
            <input name="name" type="hidden" id="name" value="{{auth()->user()->name}}" required><br>

        <label for="day_part_tags"> Day (of week) </label>
        <input name="day_part_tags" type="text" id="day_part_tags" value="{{old('day_part_tags')}}" required>

        <label for="location"> Location </label>
            <input type="text" name="location" id="location" value="{{old('location')}}" required><br>

        <label for="from_time">From (time)</label>
            <input type="time" name="from_time" id="from_time" value="{{old('from_time')}}" required><br>

        <label for="until_time"> Until (time)</label>
            <input type="time" name="until_time" id="until_time" value="{{old('until_time')}}" required><br>

        <label for="user_id"> </label>
        <input name="user_id" type="hidden" id="user_id" value="{{auth()->user()->id}}" required ><br>
        <button type="submit" > Create </button>
    </form>
    </section>
@else
    <p>Want to make as many plans as you want? Go Plus!</p>

@endif
</main>

</body>
</html>

