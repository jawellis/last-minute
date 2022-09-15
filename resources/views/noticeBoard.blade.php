<h1>{{$heading}}</h1>

@unless(count($notices) == 0)
@foreach($notices as $notice)
    <h2>
        <a href="/notices/{{$notice['id']}}">
            {{$notice['title']}}
        </a>
    </h2>
    <p>
        {{$notice['description']}}</p>
@endforeach
@else
    <p> No new plan notices found</p>
@endunless








