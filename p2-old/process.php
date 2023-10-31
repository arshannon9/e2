<?php
require 'Card.php';

session_start();

if (isset($_POST['action'])) {
    $_SESSION['action'] = $_POST['action'];
}

header('Location: index.php');