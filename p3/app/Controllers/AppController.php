<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {
        $player_choice = $this->app->old('player_choice');
        $opp_choice = $this->app->old('opp_choice');
        $won = $this->app->old('won');
        $outcome = $this->app->old('outcome');

        return $this->app->view('index', [
            'player_choice' => $player_choice,
            'opp_choice' => $opp_choice,
            'won' => $won,
            'outcome' => $outcome,
        ]);
    }

    public function process()
    {
        $player_choice = $this->app->input('player_choice');

        $opp_choice = ['paper', 'scissors', 'rock', 'lizard', 'spock'][rand(0, 4)];

        if ($player_choice == $opp_choice) {
            $won = null;
            $outcome = "You chose the same move!";
        } elseif ($player_choice == 'rock') {
            if ($opp_choice == 'scissors') {
                $won = true;
                $outcome = 'Rock breaks Scissors!';
            } elseif ($opp_choice == 'lizard') {
                $won = true;
                $outcome = 'Rock crushes Lizard!';
            } elseif ($opp_choice == 'paper') {
                $won = false;
                $outcome = 'Paper covers Rock!';
            } elseif ($opp_choice == 'spock') {
                $won = false;
                $outcome = 'Spock vaporizes Rock!';
            }
        } elseif ($player_choice == 'paper') {
            if ($opp_choice == 'rock') {
                $won = true;
                $outcome = 'Paper covers Rock!';
            } elseif ($opp_choice == 'spock') {
                $won = true;
                $outcome = 'Paper disproves Spock!';
            } elseif ($opp_choice == 'scissors') {
                $won = false;
                $outcome = 'Scissors cut Paper!';
            } elseif ($opp_choice == 'lizard') {
                $won = false;
                $outcome = 'Lizard eats Paper!';
            }
        } elseif ($player_choice == 'scissors') {
            if ($opp_choice == 'paper') {
                $won = true;
                $outcome = 'Scissors cut Paper!';
            } elseif ($opp_choice == 'lizard') {
                $won = true;
                $outcome = 'Scissors decapitate Lizard!';
            } elseif ($opp_choice == 'rock') {
                $won = false;
                $outcome = 'Rock breaks Scissors!';
            } elseif ($opp_choice == 'spock') {
                $won = false;
                $outcome = 'Spock melts Scissors!';
            } 
        } elseif ($player_choice == 'lizard') {
            if ($opp_choice == 'paper') {
                $won = true;
                $outcome = 'Lizard eats Paper!';
            } elseif ($opp_choice == 'spock') {
                $won = true;
                $outcome = 'Lizard poisons Spock!';
            } elseif ($opp_choice == 'scissors') {
                $won = false;
                $outcome = 'Scissors decapitate Lizard!';
            } elseif ($opp_choice == 'rock') {
                $won = false;
                $outcome = 'Rock crushes Lizard!';
            }  
        } elseif ($player_choice == 'spock') {
            if ($opp_choice == 'rock') {
                $won = true;
                $outcome = 'Spock vaporizes Rock!';
            } elseif ($opp_choice == 'scissors') {
                $won = true;
                $outcome = 'Spock melts Scissors!';
            } elseif ($opp_choice == 'paper') {
                $won = false;
                $outcome = 'Paper disproves Spock!';
            } elseif ($opp_choice == 'lizard') {
                $won = false;
                $outcome = 'Lizard poisons Spock!';
            }
        }

        // dump($player_choice);
        // dump($opp_choice);
        // dump($won);
        // dump($outcome);

        #TODO: Persist round details to the database

        return $this->app->redirect('/', [
            'player_choice' => $player_choice,
            'opp_choice' => $opp_choice,
            'won' => $won,
            'outcome' => $outcome,
        ]);

    }

    public function history()
    {
        return $this->app->view('history');
    }

    public function round()
    {
        return $this->app->view('round');
    }
}
