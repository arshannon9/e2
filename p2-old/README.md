# Project 2 - BLACKJACK
+ By: Anthony Shannon
+ URL: <http://e2p2.anthonyrshannon.me>

## Game planning
- Create 52-card deck with each card associated with the appropriate value (using OOP).
- Create player objects with names and hands (using OOP).
- Deal the deck into the players' hands, implemented as queues to reflect FIFO nature of the hands.
- When players play cards, they draw from the 'top' of their hand.
- The player with the highest-valued card wins the round and places both cards at the 'bottom' of their hand.
- If the cards are of equal value, a war game is initiated, wherein the previously played cards and three 'face down' cards from each player are added to the war chest, and each player plays one card 'face up'.
- The player with highest-value 'face up' card wins the war and collects the war chest, placing the won cards at the 'bottom' of their hand.
- If a player runs out of cards at the end of a round or at any time during a war game, the game ends and that player loses.
- If 1000 rounds are played with a clear winner, a stalemate is declared, and the player with the most cards in their hand wins the game. If they have the same amount of cards, the game is a DRAW.
- The results of each round (including the war game, if initiated) are saved and recorded in a rounds table.
- The number of rounds played and the ultimate outcome of the game are displayed above the rounds table.

## Outside resources
### Searches:
- Rules of Blackjack: <https://bicyclecards.com/how-to-play/blackjack>


### Image sources:
- Playing card front images: <https://byronknoll.blogspot.com/2011/03/vector-playing-cards.html>
- Playing card back image: <https://www.pngwing.com/en/free-png-tloji>

### CS50.ai assistance:
1. Query: "I have a class Card [included code]. I want to be able to display front and back images of each card in my UI. What would be the most memory-efficient way to connect these images with their respective card object?"
2. Query: "I want to display the images of cards in the player and dealer hand, but I want to show one card in the dealer's hand face down during the player's turn. What would be an effective way to manage this using PHP?"
