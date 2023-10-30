<?php
// Defines Player class
class Player {
    public $name;
    public $hand;

    public function __construct($name) {
        $this->name = $name;
        $this->hand = []; // Initialize the player hand as an empty array
    }

    // Getter
    public function getHand() {
        return $this->hand;
    }

    // Setter
    public function setHand($hand) {
        $this->hand = $hand;
    }

    // Add a card to the player's hand
    public function addToHand($card) {
        $this->hand[] = $card; 
    }

    // Clear the player's hand
    public function clearHand() {
        $this->hand = [];
    }

    // Calculate value of player's hand
    public function calculateHandValue() {
        $total_value = 0;
        $num_aces = 0; // To keep track of the number of Aces in the hand

        foreach ($this->hand as $card) {
            $total_value += $card->value;

            // Check for Aces in hand
            if ($card->rank === 'A') {
                $num_aces++;
            }
        }

        // Adjust value of Aces if they cause the hand to go bust (value over 21)
        while ($num_aces > 0 && $total_value > 21) {
            $total_value -= 10;
            $num_aces --; 
        }
        
        return $total_value;
    }

    // Check if the initial 2 cards dealt equal 21
    public function hasBlackjack() {
        if (count($this->hand) === 2) {
            $first_card_value = $this->hand[0]->value;
            $second_card_value = $this->hand[1]->value;
            return ($first_card_value + $second_card_value === 21);
        }
        
        return false;
    }
}