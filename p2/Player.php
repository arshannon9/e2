<?php
// Defines Player class
class Player {
    public $name;
    public $hand;

    public function __construct($name) {
        $this->name = $name;
        $this->hand = []; // Initialize the player hand as an empty array
    }

    // Add a card to the player's hand
    public function addToHand($card) {
        $this->hand[] = $card; 
    }

    // Clear the player's hand
    public function clearHand() {
        $this->hand = [];
    }
}