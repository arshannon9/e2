# Project 1 - WAR
+ By: Anthony Shannon
+ URL: <http://e2p1.anthonyrshannon.me>

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
- PHP queue (<https://www.educba.com/php-queue/>)
- PHP manual on:
    - isset (<https://www.php.net/manual/en/function.isset.php>)
    - Object-Oriented Programming (<https://www.php.net/manual/en/language.oop5.php>)
    - Queue/SplQueue (<https://www.php.net/manual/en/class.splqueue.php>)
    - strpos (<https://www.php.net/manual/en/function.strpos.php>)

### CS50.ai assistance:
1. Query: "Given the implementation I have [included code for table display], how would I also incorporate the display of the 'face up' cards from the WAR rounds in the Rounds table?"
2. Query: "I received 'Warning: Undefined array key 2 in /var/www/e2/p1/index.php on line 57'. What problem is this identifying?"
3. Query: "I have a class Card [included code]. I need to convert the object into a string to display the card in a table. How would I do this?"
