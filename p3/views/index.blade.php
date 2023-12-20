@extends('templates/master')

@section('content')

    <div class='container'>
        <div class='game-header'>
            <h2 id='instructions-header'>Game Instructions</h2>

            <p id='game-instructions'>Choose a move and try to defeat the computer. Good luck!</p>
            
            <h3 id='choices-header'>CHOICES</h3>

            <form method='POST' action='/process'>
                <div class='choices-row'>    
                    <ul class='choices-list'>
                        <li class='choice-emoji'>🪨</li>
                        <li><strong>Rock breaks Scissors</strong></li>
                        <li><strong>Rock crushes Lizard</strong></li>
                        <li>
                            <label class='btn btn-outline-dark'>
                                <input type='radio' name='player_choice' value='rock' test='rock-radio'> ROCK
                            </label>
                        </li>
                    </ul>
                    
                    <ul class='choices-list'>
                        <li class='choice-emoji'>📄</li>
                        <li><strong>Paper covers Rock</strong></li>
                        <li><strong>Paper disproves Spock</strong></li>
                        <li>
                            <label class='btn btn-outline-secondary'>
                                <input type='radio' name='player_choice' value='paper' test='paper-radio'> PAPER
                            </label>
                        </li>
                    </ul>

                    <ul class='choices-list'>
                        <li class='choice-emoji'>✂️</li>
                        <li><strong>Scissors cut Paper</strong></li>
                        <li><strong>Scissors decapitate Lizard</strong></li>
                        <li>
                            <label class='btn btn-outline-danger'>
                                <input type='radio' name='player_choice' value='scissors' test='scissors-radio'> SCISSORS
                            </label>
                        </li>
                    </ul>
                    
                    <ul class='choices-list'>
                        <li class='choice-emoji'>🦎</li>
                        <li><strong>Lizard eats Paper</strong></li>
                        <li><strong>Lizard poisons Spock</strong></li>
                        <li>
                            <label class='btn btn-outline-success' test='lizard-button'>
                                <input type='radio' name='player_choice' value='lizard' test='lizard-radio'> LIZARD
                            </label>
                        </li>
                    </ul>

                    <ul class='choices-list'>  
                        <li class='choice-emoji'>🖖🏻</li>
                        <li><strong>Spock melts Scissors</strong></li>
                        <li><strong>Spock vaporizes Rock</strong></li> 
                        <li>
                            <label class='btn btn-outline-primary'>
                                <input type='radio' name='player_choice' value='spock' test='spock-radio'> SPOCK
                            </label>
                        </li>
                    </ul>
                </div>
                <button class='btn btn-warning' id='player-choice' type='submit' test='submit-button' name='player_choice_submit'>Submit</button>
            </form>

            <a href='/history' id='round-history-link'>View Round History</a>
        
        <!-- Display round result -->
        @if ($player_choice)
        <div class='results' test='results-div'>
            <h4>You chose <strong><span test='player-choice'>{{ ucwords($player_choice) }}</span></strong>, the computer chose <strong><span test='opp-choice'>{{ ucwords($opp_choice) }}</span></strong>.</h4>
            @if ($won === 1)
                <h5 class='win' test='win-output'>{{ $outcome }} Congratulations, you won!</h5>
            @elseif ($won === 0)
                <h5 class='lose' test='lose-output'>{{ $outcome }} Condolences, you lost!</h5>
            @elseif ($won === 2)
                <h5 class='tie' test='tie-output'>{{ $outcome }} It's a tie!</h5>
            @endif
        </div>
        @endif
        
        <!-- Choice form validation -->
        @if($app->errorsExist())
            <ul test='choice-validation' class='error alert alert-danger'>
                @foreach($app->errors() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

@endsection
