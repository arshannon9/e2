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
            <h3>Dealer's Hand:</h3>
            <div class="hand">
                <?php
            for ($i = 0; $i < count($dealer->hand); $i++) {
                // Display the first dealer card face down initially, and the second face up
                $card = $dealer->hand[$i];
                if ($i === 0 && $dealer_turn === false) {
                    echo '<div class="card-back"><img src="' . $card->backImage . '"></div>';
                } else {
                    echo '<div class="card"><img src="' . $card->frontImage . '"></div>';
                }
            }
            ?>
            </div>
        </div>

        <div class="player-area">
            <h3>Player's Hand:</h3>
            <div class="hand">
                <?php
            foreach ($player->hand as $card) {
                // Create a container for each card with its front image
                echo '<div class="card"><img src="' . $card->frontImage . '"></div>';
            }
            ?>
            </div>
        </div>

        <div class="actions">
            <button id="hit-button">Hit</button>
            <button id="stand-button">Stand</button>
        </div>
        <div class="bet">
            <p>Player Bet: <?= $player_bet ?></p>
        </div>
        <div class="balance">
            <p>Player Balance: <?= $player_balance ?></p>
        </div>
    </div>

</body>

</html>