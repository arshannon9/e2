<?php
require __DIR__.'/vendor/autoload.php';

use RPS\Game;

$game = new Game();

# Each invocation of the `play` method will play and track a new round of player (given move) vs. computer
$game->play('rock');