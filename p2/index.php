<?php
include 'Card.php';
include 'Player.php';

// Set initial player balance
$player_balance = 2;

// Initialize player bet
$player_bet = 0;

// Initialize dealer turn to false
$dealer_turn = false;

function main() {

    global $player_balance, $player_bet, $dealer_turn;

    // Create deck and shuffle
    $deck = create_deck();

    // Create instances of Player class for player and dealer
    $player = new Player("Player");
    $dealer = new Player("Dealer");

    // Check if player's balance is above the minimum bet
    while($player_balance > 1) {

        // Ask player for their bet
        $player_bet = 0; // Form input using buttons

        // Deal initial cards
        for ($i = 0; $i < 2; $i++) {
            $card = array_pop($deck);
            array_push($player->hand, $card);

            $card = array_pop($deck);
            array_push($dealer->hand, $card);
        }

        $player_balance = $player_balance - 1;

        // MAIN GAME LOOP

        // Player's turn
            // Allow the player to make decisions

                // Hit (draw a card)

                // Stand (end the turn)

                // Double Down (optional, if player's hand qualifies)

                // Split Pairs (optional, if player's hand qualifies)

            // Check for blackjack (a natural 21)
        
            // Check for bust (total over 21)

            // Update player's hand and display cards

    
        // Dealer's turn
            // Reveal the dealer's face-down card

            // Dealer hits until total is 17 or more

            // Check for blackjack or bust

            // Update dealer's hand and display cards

    
        // Determine the winner
            // Compare the player's and dealer's hands

            // Handle special cases (push and blackjack)

            // Adjust the player's balance based on the outcome

    
        // Reshuffling
            // Check if it's time to reshuffle the deck

            // If yes, create a new deck, shuffle it, and continue the game

    
        // GAME OVER

        // Ask the player if they want to play another round

            // If yes, return to the main game loop

            // If no, end the game
        
    }
    // If player balance is less than minimum bet, end the game

    // Display the player's final balance and a farewell message
    
    return [$player, $dealer];
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


list($player, $dealer) = main();

require "index-view.php";