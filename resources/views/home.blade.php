@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <p> Welcome {{auth()->user()->name}} <br>{{ __('You are logged in!') }} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

