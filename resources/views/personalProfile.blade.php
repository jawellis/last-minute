@extends('layouts.app')

@section('content')


    <header>
        <img src="/images/profilepic.png" alt="profile pic" class="profile-pic"><br><br>
        <h1>{{auth()->user()->name}}</h1><hr>
        <nav>
            <ul>
                <li><a href="/noticeBoard"> Notice Board </a></li>
                <li><a href="/personalProfile"> Profile </a></li>
                <li><a href="/settings"> Settings </a></li>
            </ul>
        </nav><hr>
    </header>

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
                    <button>Edit</button>
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

@endsection

