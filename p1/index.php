<?php

function main() {
    // Create deck and shuffle
    $deck = create_deck();
    $shuffled_deck = shuffle_deck($deck);
    
    // Create instances of Player class for player 1 and player 2
    $player1 = new Player("Player 1");
    $player2 = new Player("Player 2");
    
    // Deal the deck into two 26-card hands to start the game
    deal_cards($shuffled_deck, $player1, $player2);
    
    // Initialize is_game_over flag to false
    $is_game_over = false;

    // Initialize game_result as empty string
    $game_outcome = '';
    
    // Initialize round counter to 0
    $round = 0;
    
    // Initialize empty array to store results of each round (for use in populating results table)
    $results = [];

    // Initialize variables to store 'face up' cards from war game
    $player1_faceup_card = null;
    $player2_faceup_card = null;

    while (!$is_game_over) {
        // Increment the round counter when each round begins
        $round++;
        
        // Initialize round_outcome as empty string
        $round_outcome = '';

        // Each player plays a card
        $player1_card = $player1->hand->dequeue();
        
        $player2_card = $player2->hand->dequeue();
        

        if ($player1_card->value > $player2_card->value) {
            // If the value of player 1's card is greater than that of player 2, player 1 wins the round and collects the played cards
            $round_outcome = "Player 1 wins this round";
            $player1->hand->enqueue($player1_card);
            $player1->hand->enqueue($player2_card);
        } elseif ($player1_card->value < $player2_card->value) {
            // If the value of player 2's card is greater than that of player 1, player 2 wins the round and collects the played cards
            $round_outcome = "Player 2 wins this round";
            $player2->hand->enqueue($player1_card);
            $player2->hand->enqueue($player2_card);
        } else {
            // If the values of the played cards are equal, war game iniitiated, returns a set including the war_chest, the victor of the war game, and the cards played 'face up' in the war game
            $result = play_war_game($player1, $player1_card, $player2, $player2_card);

            $war_chest = $result[0];

            // Using isset() ensures that elements only accessed if they exist, avoiding 'undefined array key' error
            $victor = isset($result[1]) ? $result[1] : null;
            $player1_faceup_card = isset($result[2]) ? $result[2] : null;
            $player2_faceup_card = isset($result[3]) ? $result[3] : null;

            $round_outcome = "WAR!! {$victor->name} wins this round";

            // Each card in the war chest is added to the hand of the victor
            foreach ($war_chest as $card) {
                $victor->hand->enqueue($card);
            }
        }

        // Store round results in an associative array
        $result = array(
            'Round #' => $round,
            'Player 1 card' => $player1_card,
            'Player 2 card' => $player2_card,
            'Round Outcome' => $round_outcome,
            'Player 1 hand' => $player1->hand->count(),
            'Player 2 hand' => $player2->hand->count(),
            'Player 1 face up' => $player1_faceup_card,
            'Player 2 face up' => $player2_faceup_card,
        );

        // Add the round result to the results array
        $results[] = $result;

        // If a player's hand is empty, the game is over and their opponent is declared the winner
        if ($player1->hand->isEmpty()) {
            $is_game_over = true;
            $game_outcome = "Player 1 ran out of cards. <strong>Player 2 wins!</strong>";
        } elseif ($player2->hand->isEmpty()) {
            $is_game_over = true;
            $game_outcome = "Player 2 ran out of cards. <strong>Player 1 wins!</strong>";
        } elseif ($round == 1000) {
            // If the game reaches 1000 rounds and no winner has run out of cards, a stalemate is declared, and the player with the most cards in their hand wins the game; if the players have the same amount of cards, the game ends in a draw
            $is_game_over = true;
            
            if ($player1->hand->count() > $player2->hand->count()) {
                $game_outcome = "<strong>STALEMATE</strong> - maximum number of rounds reached. Player 1 has more cards. Player 1 wins!";
            } elseif ($player1->hand->count() < $player2->hand->count()) {
                $game_outcome = "<strong>STALEMATE</strong> - maximum number of rounds reached. Player 2 has more cards. Player 2 wins!";
            } else {
                $game_outcome = "<strong>STALEMATE</strong> - maximum number of rounds reached. Both players have the same number of cards. It is a <strong>DRAW</strong>.";
            }
        }
    }
    // Generate HTML table using $results array and send to client
    generate_result_table($results, $round, $game_outcome);
}


// Defines Player class
class Player {
    public $name;
    public $hand;

    public function __construct($name) {
        $this->name = $name;
        $this->hand = new SplQueue();
    }
}


// Defines Card class
class Card {
    public $suit;
    public $rank;
    public $value;

    public function __construct($suit, $rank, $value) {
        $this->suit = $suit;
        $this->rank = $rank;
        $this->value = $value;
    }

    // Define how a Card object should be converted to a string
    public function __toString() {
        return "{$this->rank} {$this->suit}";
    }
}


// Creates 52-card deck
function create_deck() {
    // Initialize an empty array to store the cards
    $deck = [];

    // Define suits
    $suits = ["♥️", "♣️", "♦️", "♠️"];
    
    // Define rank values
    $rank_values = [
        "2" => 2,
        "3" => 3,
        "4" => 4,
        "5" => 5,
        "6" => 6,
        "7" => 7,
        "8" => 8,
        "9" => 9,
        "10" => 10,
        "J" => 11,
        "Q" => 12,
        "K" => 13,
        "A" => 14
    ];

    // Create cards for each suit and rank combination and add to deck
    foreach ($suits as $suit) {
        foreach ($rank_values as $rank => $value) {
            $card = new Card($suit, $rank, $value);
            $deck[] = $card;
        }
    }
    return $deck;
}


// Shuffles deck 5 times
function shuffle_deck($deck) {
    for ($i = 0; $i < 5; $i++) {
        shuffle($deck);
    }
    return $deck;
}


// Deals 26 cards to each player to start the game
function deal_cards($deck, $player1, $player2) {
    for ($i = 0; $i < 26; $i++) {
        // Remove a card from the deck and add it to player 1's hand
        $card = array_pop($deck);
        $player1->hand->enqueue($card);
        
        // Remove a card from the deck and add it to player 2's hand
        $card = array_pop($deck);
        $player2->hand->enqueue($card);
    }
}


// Plays the 'war game' when players play cards of equal value
function play_war_game($player1, $player1_card, $player2, $player2_card) {
    // Initialize queue to store cards in war chest
    $war_chest = new SplQueue();
    
    // Store the cards already played
    $war_chest->enqueue($player1_card);
    $war_chest->enqueue($player2_card);
    
    // Initialize the war_has_victor flag to false
    $war_has_victor = false;

    while (!$war_has_victor) {
        // Each player plays three cards 'face down'
        for ($i = 0; $i < 3; $i++) {
            // Check if a player's hand is empty before playing each 'face down' card
            if ($player1->hand->isEmpty()) {
                return [$war_chest, $player2];
            }
            if ($player2->hand->isEmpty()) {
                return [$war_chest, $player1];
            }
            $war_chest->enqueue($player1->hand->dequeue());
            $war_chest->enqueue($player2->hand->dequeue());
        }

        // Check if a player's hand is empty after playing 'face down' cards
        if ($player1->hand->isEmpty()) {
            return [$war_chest, $player2];
        }
        if ($player2->hand->isEmpty()) {
            return [$war_chest, $player1];
        }

        // Each player plays one card 'face up'
        $player1_faceup_card = $player1->hand->dequeue();
        $player2_faceup_card = $player2->hand->dequeue();

        // Determine the outcome of the war game
        if ($player1_faceup_card->value > $player2_faceup_card->value) {
             // If the value of player 1's 'face up' card is greater than that of player 2, player 1 wins the war game and collects the faceup cards and war chest
            $player1->hand->enqueue($player1_faceup_card);
            $player1->hand->enqueue($player2_faceup_card);
            $war_has_victor = true;
            return [$war_chest, $player1, $player1_faceup_card, $player2_faceup_card];
        } elseif ($player1_faceup_card->value < $player2_faceup_card->value) {
            // If the value of player 2's 'face up' card is greater than that of player 1, player 2 wins the war game and collects the faceup cards and war chest
            $player2->hand->enqueue($player1_faceup_card);
            $player2->hand->enqueue($player2_faceup_card);
            $war_has_victor = true;
            return [$war_chest, $player2, $player1_faceup_card, $player2_faceup_card];
        } else {
            // If the values of the played cards are equal, another war is declared, and the played cards are added to the war chest
            $war_chest->enqueue($player1_faceup_card);
            $war_chest->enqueue($player2_faceup_card);
        }
    }
}


// Generates HTML for results table using $results array
function generate_result_table($results, $round, $game_outcome) {
    echo "<h2>Results</h2>";
    echo "<ul>
            <li>{$round} rounds played
            </li>
            <li>{$game_outcome}
            </li>
        </ul>";

    echo "<h2>Rounds</h2>";
    
    echo "<table>";

    // Add table headers
    echo "<tr>
            <th>Round #</th>
            <th>Player 1 Card</th>
            <th>Player 2 Card</th>
            <th>Round Outcome</th>
            <th>Player 1 Hand</th>
            <th>Player 2 Hand</th>
          </tr>";

    foreach ($results as $result) {
        echo "<tr>";
        echo "<td>{$result['Round #']}</td>";
        echo "<td><span class='card'>{$result['Player 1 card']}</span></td>";
        echo "<td><span class='card'>{$result['Player 2 card']}</span></td>";
        echo "<td>{$result['Round Outcome']}</td>";
        echo "<td>{$result['Player 1 hand']}</td>";
        echo "<td>{$result['Player 2 hand']}</td>";
        echo "</tr>";

        // Check if this round had a WAR declared using strpos
        if (strpos($result['Round Outcome'], 'WAR') !== false) {
            echo "<tr>";
            echo "<td>WAR</td>";
            if ($result['Player 1 hand'] == 0) {
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>Player 1 ran out of cards</td>";
            } else if ($result['Player 2 hand'] == 0) {
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>Player 2 ran out of cards</td>";
            } else {
                echo "<td><span class='card'>{$result['Player 1 face up']}</span></td>";
                echo "<td><span class='card'>{$result['Player 2 face up']}</span></td>";
                echo "<td></td>";
            }
            echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";
        }
    }
    echo "</table>";
}

require "index-view.php";