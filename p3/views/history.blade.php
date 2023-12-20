@extends('templates/master')

@section('title')
    Round History
@endsection

@section('content')
    <div class='container'>
        <div class='game-header'>
            <h2>Round History</h2>
            <ul>
            
            @foreach($rounds as $round)
                <li><a href='/round?id={{ $round['id'] }}' test='round-link'>{{ $round['timestamp'] }}</li>
            @endforeach
            
            </ul>
            <a href='/'>Home</a>
        </div>
    </div>


@endsection