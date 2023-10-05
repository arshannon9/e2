<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project 1 - WAR</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Project 1 - WAR</h1>
    <h2>Game Mechanics</h2>
    <ul>
        <li>Each player starts with a hand comprising half of the deck (26 cards), shuffled in a random order.</li>
        <li>For each round, each player plays the card from the top of their hand.</li>
        <li>The player who plays the card with the higher value wins the round, keeps both cards, and places them at
            the
            bottom of their hand.</li>
        <li>If the players play cards of the same value, <strong>WAR is declared</strong>:
            <ul>
                <li>The cards just played are added to the <strong><em>war chest</em></strong>.</li>
                <li>Each player adds an additional three cards from the top of their hand to the war chest
                    <strong><em>face down</em></strong>.
                </li>
                <li>Each player plays the top card from their hand <strong><em>face up</em></strong> as their
                    <strong><em>war card</em></strong>.
                </li>
                <li>The player who plays the war card with the higher value wins the war and keeps both war cards
                    and
                    the war chest.</li>
                <li>If the two war cards are of the same value, the war cards are added to the war chest and the war
                    continues until the war is won.</li>
                <li>If a player runs out of cards, the game ends and their opponent is declared the winner.</li>
            </ul>
        </li>
        <li>The player who ends up with <strong><em>all 52 cards</em></strong> in their hand is declared the winner.
        </li>
        <li>If the game reaches 1000 rounds without a clear winner, a <strong>STALEMATE is declared</strong>:
            <ul>
                <li>The player with the most cards in their hand is declared the winner.</li>
                <li>If the players have the same number of cards, the game ends in a <strong>DRAW</strong>.</li>
            </ul>
        </li>
    </ul>

    <?php

    main();

    ?>
</body>

</html>