<!DOCTYPE html>
<html lang="en">

<head>

    <title>Project 2 - BLACKJACK</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <h1>Project 2 - BLACKJACK</h1>

    <h2>Game Instructions</h2>

    <ul>

    </ul>
    <hr>
    <div class="container">
        <div class="dealer-area">
            <h3>DEALER</h3>
            <div class="hand">
                <?php
                if ($dealer_hand !== null && is_array($dealer_hand)) {
                    for ($i = 0; $i < count($dealer_hand); $i++) {
                        // Display the first dealer card face down initially, and the second face up
                        $card = $dealer_hand[$i];
                        if ($i === 0 && $is_player_turn === true) {
                            echo '<div class="card-back"><img src="' . $card->backImage . '"></div>';
                        } else {
                        echo '<div class="card"><img src="' . $card->frontImage . '"></div>';
                        }
                    }
                } else {
                    // Handle the case where the dealer's hand is not initialized
                    echo 'Dealer\'s hand is not available.';
                }
            ?>
            </div>
        </div>

        <div class="player-area">
            <h3>PLAYER</h3>
            <div class="hand">
                <?php
                if ($player_hand !== null && is_array($player_hand)) {
                    foreach ($player_hand as $card) {
                        // Create a container for each card with its front image
                        echo '<div class="card"><img src="' . $card->frontImage . '"></div>';
                    }
                } else {
                    // Handle the case where the dealer's hand is not initialized
                    echo 'Player\'s hand is not available.';
                }
            ?>
            </div>
        </div>

        <div class='game-controls'>
            <form method='POST' action='process.php'>

                <fieldset id='action-form'>
                    <legend>Actions: </legend>
                    <button type='submit' id='deal-btn' name='action' value='deal'>Deal</button>
                    <button type='submit' id='hit-btn' name='action' value='hit'>Hit</button>
                    <button type='submit' id='stay-btn' name='action' value='stay'>Stay</button>
                </fieldset>

            </form>
        </div>
    </div>

</body>

</html>