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

    <section class="plan-notice">
    <form method="POST" action="/noticeBoard">
        @csrf

        <label for="name"> </label>
            <input name="name" type="hidden" id="name" value="{{auth()->user()->name}}"><br>


        <label for="day_part_tags"> Day </label>
            <select name="day_part_tags" id="day_part_tags">
                <option> Select day </option>
                <option> Monday </option>
                <option> Tuesday </option>
                <option> Wednesday </option>
                <option> Thursday </option>
                <option> Friday </option>
                <option> Saturday </option>
                <option> Sunday </option>
            </select><br>

        <label for="location"> Location </label>
            <input type="text" name="location" id="location" ><br>

        <label for="from_time">From (time)</label>
            <input type="time" name="from_time" id="from_time"><br>

        <label for="until_time"> Until (time)</label>
            <input type="time" name="until_time" id="until_time"><br>

        <label for="user_id"> </label>
        <input name="user_id" type="hidden" id="user_id" value="{{auth()->user()->id}}" ><br>
        <button type="submit" > Create </button>
    </form>
    </section>


</main>

</body>
</html>
