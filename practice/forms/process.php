<?php

$answer = $_GET['answer'];

if ($answer == 'pumpkin') {
    $correct = true;
} else {
    $correct = false;
}

require 'process-view.php';