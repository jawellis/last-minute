@extends('layouts.app')

@section('content')
    <a href="/noticeBoard" class="back-btn"> < </a>

    <header>
        <img src="/images/profilepic.png" alt="profile pic" class="profile-pic"><br><br>
        <h1>{{auth()->user()->name}}</h1><hr>
        <nav>
            <ul>
                <li> Profile </li>
                <li> Settings </li>
            </ul>
        </nav><hr>
    </header>

    @unless(count($notices) == 0)
    <section class="plan-notice">
        @foreach($notices as $notice)
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
        <p> No new plan notices found</p>
    @endunless

@endsection

