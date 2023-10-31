<!DOCTYPE html>
<html lang="en">

<head>

    <title>Project 2 - Hi-Lo Guessing Game</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">

</head>

<body>

    <div class='container'>
        <div class='game-header'>
            <h1>Project 2 - Hi-Lo Guessing Game</h1>

            <h3>Game Instructions</h3>

            <ul id='instructions'>
                <li>Guess whether the value of the dealer's face-down card is higher or lower than the value of your
                    face-up card.</li>
                <li>Click the 'Higher' or 'Lower' button to record your answer.</li>
                <li><strong>NB: </strong>Aces are high.</li>
            </ul>

            <h3>SCORING</h3>

            <ul id='scoring'>
                <li><strong>Correct:</strong> +10 points</li>
                <li><strong>Incorrect:</strong> -5 points</li>
                <li><strong>Push (Tie):</strong> +5 points</li>
                <li><strong>100 points</strong> wins the game!</li>
                <li><strong>-50 points</strong> loses the game!</li>
            </ul>
        </div>
    </div>
    <hr>
    <div class='container'>
        <?php if (isset($_SESSION['newgame'])) { ?>
        <?php if ($new_game) { ?>
        <?php if ($score < 100 && $score > -50) { ?>
        <div class='card-display'>
            <fieldset class='game-card dealer'>
                <legend>Dealer's card: </legend>
                <div class='card-back'>
                    <img src="<?php echo $dealer_card->backImage; ?>" />
                </div>
            </fieldset>
            <fieldset class='game-card player'>
                <legend>Player's card: </legend>
                <div class='card'>
                    <img src="<?php echo $player_card->frontImage; ?>" />
                </div>
            </fieldset>
        </div>

        <div class='game-controls'>
            <form method='POST' action='process.php'>

                <div class='button-row'>
                    <button class='btn btn-higher' type='submit' id='higher-btn' name='guess'
                        value='higher'>Higher</button>
                    <p>or</p>
                    <button class='btn btn-lower' type='submit' id='lower-btn' name='guess' value='lower'>Lower</button>
                </div>

            </form>
        </div>
        <?php } elseif ($score >= 100) {?>
        <h1 class='win'>Congratulations!! You won!!</h1>
        <?php } elseif ($score <= -50) { ?>
        <h1 class='lose'>Commiserations!! You lost!!</h1>
        <?php } ?>
        <?php } ?>
        <?php } ?>

        <?php if (!$new_game || $score >= 100 || $score <= -50) { ?>
        <div class='new-game'>
            <p>Click 'New Game' to begin!</p>
            <form method='POST' action='process.php'>
                <button class='btn btn-new' type='submit' id='new-game' name='newgame' value='newgame'>New
                    Game</button>
            </form>
        </div>
        <?php } ?>

        <?php if ($result) { ?>
        <hr>
        <div class='results'>
            <h3>Results</h3>
            <ul>
                <li><?php echo $result[3]; ?></li>
                <li>Score: <?php echo $score; ?></li>
            </ul>
            <div class='result-cards'>
                <fieldset class='result-card'>
                    <legend>Dealer's card: </legend>
                    <div class='card'>
                        <img src="<?php echo $result[2]->frontImage; ?>" />
                    </div>
                </fieldset>
                <fieldset class='result-card'>
                    <legend>Player's card: </legend>
                    <div class='card'>
                        <img src="<?php echo $result[1]->frontImage; ?>" />
                    </div>
                </fieldset>
            </div>
        </div>
        <?php } ?>
    </div>

</body>

</html>