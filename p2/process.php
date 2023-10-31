<?php
require 'Card.php';

session_start();

// Check if the session variable 'newgame' exists and set it to true for a new game state on load
if (isset($_SESSION['newgame'])) {
    $_SESSION['newgame'] = true;
}

// Initialize the score if it doesn't exist
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

// Check if the 'New Game' button is clicked
if (isset($_POST['newgame'])) {
    // End the current session
    session_destroy();

    // Start a new session
    session_start();
    
    // Reset session variable 'result' and set 'newgame' to true
    $_SESSION['result'] = '';
    $_SESSION['newgame'] = true;

    // Redirect to index
    header('Location: index.php');
    exit;
}

if (isset($_POST['guess'])) {
    // When either 'Higher' or 'Lower' is clicked, record the player's input
    $player_guess = $_POST['guess'];

    // Retrieve player and dealer cards from the session
    $player_card = $_SESSION['player_card'];
    $dealer_card = $_SESSION['dealer-card'];

    // Determine result based on player's guess
    $result = determineResult($player_card, $dealer_card, $player_guess);

    // Store result in the session
    $_SESSION['result'] = $result;
}

// Redirect to index
header('Location: index.php');

// Compare the values of the player and dealer cards, record the score for the round, and return result array
function determineResult($player_card, $dealer_card, $player_guess) {
    $result_text = '';

    if ($player_card->value == $dealer_card->value) {
        // If it is a tie, return 'Push'
        $result = 'push';
        $result_text = "It's a TIE!";
        $_SESSION['score'] += 5; 
    } elseif (($player_guess === 'higher' && $player_card->value < $dealer_card->value) || 
              ($player_guess === 'lower' && $player_card->value > $dealer_card->value)) {
        $result = 'incorrect';
        $result_text = "You are INCORRECT!";
        $_SESSION['score'] -= 5;
    } else {
        $result = 'correct';
        $result_text = "You are CORRECT!";
        $_SESSION['score'] += 10;
    }

    return [$result, $player_card, $dealer_card, $result_text];
}