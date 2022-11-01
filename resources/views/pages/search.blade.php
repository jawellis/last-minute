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

    <form action="/filter" method="get">
        <label for="sort_by"></label>
        <select name="sort_by" id="sort_by">
            <option> order by Active </option>
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
                    </p><br>
                    <form method="POST">
                        <input data-id="{{$notice->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $notice->status ? 'checked' : '' }}>
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
                        @else
                            <button>Make plans</button>
                            <button>Invite</button>
                            <button>Hide</button>
                        @endif
                    </section>
                </section>




            @endif
        @endforeach


        {{--pagination --}}
        {{--    {{$notices->links()}}--}}
    @else
        <p> No plan notices found with this description.</p>
        <a href="/noticeBoard" class="back-btn"> Back to notice board</a>
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
<script>
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') === true ? 0 : 1;
            var notice_id = $(this).data('id');
            $.ajax({

                type: "GET",
                dataType: "json",
                url: '/statusUpdate',
                data: {'status': status, 'notice_id': notice_id},
                success: function(data){
                    console.log('success')
                }
            });
        })
    });
</script>

