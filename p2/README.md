# Project 2 - Hi-Lo Guessing Game
+ By: Anthony Shannon
+ URL: <http://e2p2.anthonyrshannon.me>

## Outside resources
### Searches:
- How to handle multiple forms in a PHP process file: <https://stackoverflow.com/questions/10459012/multiple-forms-and-one-processing-page>

### Image sources:
- Playing card front images: <https://byronknoll.blogspot.com/2011/03/vector-playing-cards.html>
- Playing card back image: <https://www.pngwing.com/en/free-png-tloji>

### Frameworks:
- Buttons adapted from Bootstrap: <https://getbootstrap.com/docs/4.0/components/buttons/>

### CS50.ai assistance:
1. Query: "I have a class Card [included code]. I want to be able to display front and back images of each card in my UI. What would be a memory-efficient way to connect these images with their respective card object?"
2. Query: "I want to display the images of the player and dealer cards, but I want to show a dealer card face down during the player's turn. What would be an effective way to manage this using PHP?"
3. Query: "I am trying to keep score, and I have run into two competing issues. In one setup, the score resets whenever I click a button that submits a form. In another setup, the score persists when I click the buttons, but does not reset when I reset the game. I think it has to do with how I am handling session variables. What might be the problem?" 

## Notes for instructor:
- I reused the Card class from my project 1 submission with some modifications to incorporate images of cards instead of rendering the cards as strings. I included the class in a separate php file in accordance with OOP best practices.
- This project was salvaged from an aborted attempt at making a Blackjack game. I got stuck on the procedure of adding cards to a hand when the player clicks the 'Hit' button and having the player and dealer hands persist in the session. I might work some more on this original project separately to try and break through the bugs I kept encountering, but this project utilizes portions of that original attempt that I could get to work properly.
