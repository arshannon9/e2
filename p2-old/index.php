<?php
require 'Card.php';

session_start();

// Initialize player turn to false
$is_player_turn = false;

// Initialize game over tag
$is_game_over = false;

// Initialize result string
$result = '';

// Initialize player and dealer hands as arrays
$player_hand = [];
$dealer_hand = [];

function main() {

    global $is_player_turn, $is_game_over, $result, $player_hand, $dealer_hand;

    // Create deck and shuffle
    $deck = create_deck();

    // Initialize player and dealer hand values
    $player_total_value = 0;
    $dealer_total_value = 0;

    // Set player and dealer hands in the session
    $_SESSION['player_hand'] = $player_hand;
    $_SESSION['dealer_hand'] = $dealer_hand;

    if (!$is_game_over) {
        $is_player_turn = true;

        // Deal initial cards
        if (isset($_SESSION['action'])) {
            if ($_SESSION['action'] === 'deal') {
                for ($i = 0; $i < 2; $i++) {
                    $card = array_pop($deck);
                    $player_hand[] = $card;

                    $card = array_pop($deck);
                    $dealer_hand[] = $card;
                }
                // Check for a natural blackjack
                if (hasBlackjack($player_hand)) {
                    $result = 'Player has blackjack!';
                    $is_player_turn = false;
                }

                $player_total_value = calculateHandValue($player_hand);
                $_SESSION['player_hand'] = $player_hand;
                var_dump($player_total_value);
                $dealer_total_value = calculateHandValue($dealer_hand);
                var_dump($dealer_total_value);
                $_SESSION['dealer_hand'] = $dealer_hand;
            } 

            
            
            if ($_SESSION['action'] === 'hit') {
                while ($player_total_value <= 21) {
                    // Hit (deal a card)
                    $card = array_pop($deck);
                    $player_hand[] = $card;
                    $player_total_value = calculateHandValue($player_hand);
                    
                    var_dump($player_total_value);
                    
            
                    if ($player_total_value <= 21) {
                        // Display updated player's hand and card
                        $_SESSION['player_hand'] = $player_hand;
                        $_SESSION['dealer_hand'] = $dealer_hand;
                    } else {
                        // Player goes bust, handle this case
                        $result = 'Player goes bust!';
                        $_SESSION['player_hand'] = $player_hand;
                        $_SESSION['dealer_hand'] = $dealer_hand;
                        $is_player_turn = false;
                    }
                }
            }
            
            
            if ($_SESSION['action'] === 'stay') {
                var_dump($_SESSION['action']);
                // Stand (end the turn)
                $_SESSION['player_hand'] = $player_hand;
                $is_player_turn = false;
            }
        }

        // Check for a natural blackjack
        if (hasBlackjack($player_hand)) {
            $result = 'Player has blackjack!';
            $is_player_turn = false;
        }
        var_dump($_SESSION['action']);
    } else {
        $result = 'Player goes bust!';
    }
        
        // Check for bust (total over 21)

        // Update player's hand and display cards

        // Dealer's turn

        // Dealer hits until total is 17 or more

        // Check for blackjack or bust

        // Update dealer's hand and display cards

        // Determine the winner
        // Compare the player's and dealer's hands

        // Handle special cases (push and blackjack)

        // Reshuffling
        // Check if it's time to reshuffle the deck

        // If yes, create a new deck, shuffle it, and continue the game

        // GAME OVER

        // Ask the player if they want to play another round

        // If yes, return to the main game loop

        // If no, end the game
    

    // Display the player's final balance and a farewell message
    
    return [$player_hand, $dealer_hand];
}

// Calculates the total value of a hand
function calculateHandValue($hand) {
    $total = 0;
    $ace_count = 0;

    foreach ($hand as $card) {
        $total += $card->value;
        if ($card->rank === 'A') {
            $ace_count++;
        }
    }

    // Handle aces (if the total is over 21)
    while ($ace_count > 0 && $total > 21) {
        $total -= 10;
        $ace_count--;
    }

    return $total;
}

// Checks for a natural blackjack
function hasBlackjack($hand) {
    if (count($hand) === 2 && calculateHandValue($hand) === 21) {
        return true;
    }
    return false;
}

// Creates and shuffles a 52-card deck
function create_deck() {
    // Initialize an empty array to store the cards
    $deck = [];

    // Define suits
    $suits = ["hearts", "clubs", "diamonds", "spades"];

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
        "J" => 10,
        "Q" => 10,
        "K" => 10,
        "A" => 11
    ];

    // Define image paths for front and back
    $backImage = "assets/card_back.png";

    // Create cards for each suit and rank combination and add to deck
    foreach ($suits as $suit) {
        foreach ($rank_values as $rank => $value) {
            $frontImage = "assets/" . $rank . "_" . $suit . ".png"; 
            $card = new Card($suit, $rank, $value, $frontImage, $backImage);
            $deck[] = $card;
        }
    }

    for ($i = 0; $i < 5; $i++) {
        shuffle($deck);
    }
    return $deck;
}

list($player_hand, $dealer_hand) = main();

require "index-view.php";