<?php
require 'Card.php';

session_start();

// Initialize game
$deck = create_deck();
$player_card = array_pop($deck);
$dealer_card = array_pop($deck);
$score = 0;

// Store the dealt cards in the session
$_SESSION['player_card'] = $player_card;
$_SESSION['dealer-card'] = $dealer_card;

// Store session variables
$result = $_SESSION['result'];
$new_game = $_SESSION['newgame'];

// Keep score
if (isset($_SESSION['score'])) {
    $score = $_SESSION['score'];
}

// Reset session variables for display control purposes
$_SESSION['newgame'] = false;
$_SESSION['result'] = '';

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
        "J" => 11,
        "Q" => 12,
        "K" => 13,
        "A" => 14
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

require "index-view.php";