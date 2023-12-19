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

    /**
     * This method is triggered by the route "/process"
     */
    public function process()
    {
        $this->app->validate([
            'player_choice' => 'required'
        ]);
        
        $player_choice = $this->app->input('player_choice');

        $opp_choice = ['rock', 'paper', 'scissors', 'lizard', 'spock'][rand(0, 4)];

        # Game logic
        if ($player_choice == $opp_choice) {
            $won = 2;
            $outcome = "Both chose the same move!";
        } elseif ($player_choice == 'rock') {
            if ($opp_choice == 'scissors') {
                $won = 1;
                $outcome = 'Rock breaks Scissors!';
            } elseif ($opp_choice == 'lizard') {
                $won = 1;
                $outcome = 'Rock crushes Lizard!';
            } elseif ($opp_choice == 'paper') {
                $won = 0;
                $outcome = 'Paper covers Rock!';
            } elseif ($opp_choice == 'spock') {
                $won = 0;
                $outcome = 'Spock vaporizes Rock!';
            }
        } elseif ($player_choice == 'paper') {
            if ($opp_choice == 'rock') {
                $won = 1;
                $outcome = 'Paper covers Rock!';
            } elseif ($opp_choice == 'spock') {
                $won = 1;
                $outcome = 'Paper disproves Spock!';
            } elseif ($opp_choice == 'scissors') {
                $won = 0;
                $outcome = 'Scissors cut Paper!';
            } elseif ($opp_choice == 'lizard') {
                $won = 0;
                $outcome = 'Lizard eats Paper!';
            }
        } elseif ($player_choice == 'scissors') {
            if ($opp_choice == 'paper') {
                $won = 1;
                $outcome = 'Scissors cut Paper!';
            } elseif ($opp_choice == 'lizard') {
                $won = 1;
                $outcome = 'Scissors decapitate Lizard!';
            } elseif ($opp_choice == 'rock') {
                $won = 0;
                $outcome = 'Rock breaks Scissors!';
            } elseif ($opp_choice == 'spock') {
                $won = 0;
                $outcome = 'Spock melts Scissors!';
            } 
        } elseif ($player_choice == 'lizard') {
            if ($opp_choice == 'paper') {
                $won = 1;
                $outcome = 'Lizard eats Paper!';
            } elseif ($opp_choice == 'spock') {
                $won = 1;
                $outcome = 'Lizard poisons Spock!';
            } elseif ($opp_choice == 'scissors') {
                $won = 0;
                $outcome = 'Scissors decapitate Lizard!';
            } elseif ($opp_choice == 'rock') {
                $won = 0;
                $outcome = 'Rock crushes Lizard!';
            }  
        } elseif ($player_choice == 'spock') {
            if ($opp_choice == 'rock') {
                $won = 1;
                $outcome = 'Spock vaporizes Rock!';
            } elseif ($opp_choice == 'scissors') {
                $won = 1;
                $outcome = 'Spock melts Scissors!';
            } elseif ($opp_choice == 'paper') {
                $won = 0;
                $outcome = 'Paper disproves Spock!';
            } elseif ($opp_choice == 'lizard') {
                $won = 0;
                $outcome = 'Lizard poisons Spock!';
            }
        }

        $this->app->db()->insert('rounds', [
            'player_choice' => $player_choice,
            'opp_choice' => $opp_choice,
            'won' => $won,
            'outcome' => $outcome,
            'timestamp' => date('Y-m-d H:i:s'),
        ]);

        return $this->app->redirect('/', [
            'player_choice' => $player_choice,
            'opp_choice' => $opp_choice,
            'won' => $won,
            'outcome' => $outcome,
        ]);

    }

    /**
     * This method is triggered by the route "/history"
     */
    public function history()
    {
        $rounds = $this->app->db()->all('rounds');

        // Pass the data to your view/template for rendering
        return $this->app->view('history', ['rounds' => $rounds]);
    }

    /**
     * This method is triggered by the route "/round"
     */
    public function round()
    {
        $id = $this->app->param('id');

        $round = $this->app->db()->findById('rounds', $id);

        return $this->app->view('round', ['round' => $round]);
    }
}
