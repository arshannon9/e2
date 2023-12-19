@extends('templates/master')

@section('title')
    Round Details
@endsection

@section('content')
    <div class='container'>
        <div class='game-header'>
            <h2>Round Details</h2>

            <ul class='round-detail'>
                <li>Round {{ $round['id'] }}</li>
                <li>Player: <strong>{{ ucwords($round['player_choice']) }}</strong></li>
                <li>Computer: <strong>{{ ucwords($round['opp_choice']) }}</strong></li>
                <li><strong>{{ $round['outcome'] }}</strong></li>
                <li>
                    <strong>
                    @if($round['won'] === 0)
                        Player lost
                    @elseif($round['won'] === 1)
                        Player won 
                    @else
                        It was a draw
                    @endif 
                    </strong>   
                </li>
                <li>Timestamp: {{ $round['timestamp'] }}</li>
            </ul>
            <a href='/history'>Back to Round History</a>
        </div>
    </div>
@endsection