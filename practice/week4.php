<?php

$moves = ['rock', 'paper', 'scissors']; # Array of strings

$strawLengths = [2, 2, 2, 2, 2, 1];

$mixed = ['rock', 1, .04, true];

// echo $moves[0];
// echo $moves[1];
// echo $moves[2];
// echo $moves[3]; # Undefined array key 3
// var_dump($mixed);

$randomNumber = rand(0, 2);

$move = $moves[$randomNumber];

var_dump($move);