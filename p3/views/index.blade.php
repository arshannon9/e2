@extends('templates/master')

@section('content')

    <div class='container'>
        <div class='game-header'>
            <h2>Game Instructions</h2>

            <p id='game-instructions'>Choose a move and try to defeat the computer. Good luck!</p>

            <h3 id='scoring-header'>SCORING</h3>
            <div class='scoring-container'>
                <ul class='scoring-list'>
                    <li class='emoji'>🪨</li>
                    <li><strong>Rock breaks Scissors</strong></li>
                    <li><strong>Rock crushes Lizard</strong></li>
                </ul>
                
                <ul class='scoring-list'>
                    <li class='emoji'>📄</li>
                    <li><strong>Paper covers Rock</strong></li>
                    <li><strong>Paper disproves Spock</strong></li>
                </ul>

                <ul class='scoring-list'>
                    <li class='emoji'>✂️</li>
                    <li><strong>Scissors cut Paper</strong></li>
                    <li><strong>Scissors decapitate Lizard</strong></li>
                </ul>
                
                <ul class='scoring-list'>
                    <li class='emoji'>🦎</li>
                    <li><strong>Lizard eats Paper</strong></li>
                    <li><strong>Lizard poisons Spock</strong></li>
                </ul>

                <ul class='scoring-list'>  
                    <li class='emoji'>🖖🏻</li>
                    <li><strong>Spock melts Scissors</strong></li>
                    <li><strong>Spock vaporizes Rock</strong></li> 
                </ul>
            </div>

            <div class='game-controls'>
                <form method='POST' action='/process'>

                    <div class='button-row'>
                        <button class='btn btn-outline-dark' type='submit' id='rock' name='player_choice' value='rock'>ROCK</button>
                        
                        <button class='btn btn-outline-secondary' type='submit' id='paper' name='player_choice' value='paper'>PAPER</button>
                        
                        <button class='btn btn-outline-danger' type='submit' id='scissors' name='player_choice' value='scissors'>SCISSORS</button>
                        
                        <button class='btn btn-outline-success' type='submit' id='lizard' name='player_choice' value='lizard'>LIZARD</button>
                        
                        <button class='btn btn-outline-primary' type='submit' id='spock' name='player_choice' value='spock'>SPOCK</button>
                    </div>

                </form>
            </div>

         @if ($player_choice)
        <div class='results'>
            <h4>You chose <strong>{{ ucwords($player_choice) }}</strong>, the computer chose <strong>{{ ucwords($opp_choice) }}</strong>.</h4>
            @if ($won === true)
                <h5 class='win'>{{ $outcome }} Congratulations, you won!</h5>
            @elseif ($won === false)
                <h5 class='lose'>{{ $outcome }} Condolences, you lost!</h5>
            @elseif ($won === null)
                <h5 class='tie'>{{ $outcome }} It's a tie!</h5>
            @endif
        </div>
        @endif

@endsection
