<?php
// Define Card class
class Card {
    public $suit;
    public $rank;
    public $value;
    public $frontImage;
    public $backImage;

    public function __construct($suit, $rank, $value, $frontImage, $backImage) {
        $this->suit = $suit;
        $this->rank = $rank;
        $this->value = $value;
        $this->frontImage = $frontImage;
        $this->backImage = $backImage;
    }

    // Define how a Card object should be converted to a string
    public function __toString() {
        return "{$this->rank} {$this->suit}";
    }
}