# Project 3
+ By: Anthony Shannon
+ URL: <http://e2p3.anthonyrshannon.me>

## Graduate requirement
*x one of the following:*
+ [x] I have integrated testing into my application
+ [ ] I am taking this course for undergraduate credit and have opted out of integrating testing into my application

## Outside resources
### Searches:
- What are the rules of Rock, Paper, Scissors, Lizard, Spock: <https://adams.osu.edu/sites/adams/files/imce/4-H/STEM_Camp/Rock%20Paper%20Scissors%20Lizard%20Spock.pdf>

### Image sources
- Vulcan salute emoji favicon: <https://favicon.io/emoji-favicons/vulcan-salute>
- Rock, Paper, Scissors, Lizard, Spock logo: <https://puzzlewocky.com/parlor-games/rock-paper-scissors-lizard-spock/>

### CS50.ai assistance
1. Query: "I am rendering the following line using Blade: 'You chose {{ $player_choice }}, the computer chose {{ $opp_choice }}.' How would I render the data stored in $player_choice and $opp_choice in Title Case?"
    - Suggested using ucwords

2. Query: "I am testing using Codeception, and the game tests keep failing even though the form validation test passes and the code works IRL [included code]. What am I overlooking?"
    - Identified that I had misspelled 'submit' as 'sumbit' in my game tests.

## Notes for instructor
- I decided to go for something a little simpler this time, as converting my Hi-Lo card game was taking too long. I think this came out well. 
- I rewatched all of the framework videos and the sample build videos and they were tremendously helpful. 
- Thanks for a fun, challenging semester, and I am looking forward to round 2 in CSCI E-15 in the spring!

## Codeception testing output
```
Tests.Acceptance Tests (7) --------------------------------------------------------------------------------------------------------------------------------------
P3Cest: Test rock
Signature: Tests\Acceptance\P3Cest:testRock
Test: tests/Acceptance/P3Cest.php:testRock
Scenario --
 I am on page "/"
 I fill field "[test=rock-radio]","rock"
 I click "[test=submit-button]"
 I see element "[test=results-div]"
 I grab text from "[test=player-choice]"
 The player chose Rock
 I grab text from "[test=opp-choice]"
 The player chose Rock
 I see element "[test=tie-output]"
 PASSED 

P3Cest: Test paper
Signature: Tests\Acceptance\P3Cest:testPaper
Test: tests/Acceptance/P3Cest.php:testPaper
Scenario --
 I am on page "/"
 I fill field "[test=paper-radio]","paper"
 I click "[test=submit-button]"
 I see element "[test=results-div]"
 I grab text from "[test=player-choice]"
 The player chose Paper
 I grab text from "[test=opp-choice]"
 The player chose Scissors
 I see element "[test=lose-output]"
 PASSED 

P3Cest: Test scissors
Signature: Tests\Acceptance\P3Cest:testScissors
Test: tests/Acceptance/P3Cest.php:testScissors
Scenario --
 I am on page "/"
 I fill field "[test=scissors-radio]","scissors"
 I click "[test=submit-button]"
 I see element "[test=results-div]"
 I grab text from "[test=player-choice]"
 The player chose Scissors
 I grab text from "[test=opp-choice]"
 The player chose Paper
 I see element "[test=win-output]"
 PASSED 

P3Cest: Test lizard
Signature: Tests\Acceptance\P3Cest:testLizard
Test: tests/Acceptance/P3Cest.php:testLizard
Scenario --
 I am on page "/"
 I fill field "[test=lizard-radio]","lizard"
 I click "[test=submit-button]"
 I see element "[test=results-div]"
 I grab text from "[test=player-choice]"
 The player chose Lizard
 I grab text from "[test=opp-choice]"
 The player chose Lizard
 I see element "[test=tie-output]"
 PASSED 

P3Cest: Test spock
Signature: Tests\Acceptance\P3Cest:testSpock
Test: tests/Acceptance/P3Cest.php:testSpock
Scenario --
 I am on page "/"
 I fill field "[test=spock-radio]","spock"
 I click "[test=submit-button]"
 I see element "[test=results-div]"
 I grab text from "[test=player-choice]"
 The player chose Spock
 I grab text from "[test=opp-choice]"
 The player chose Paper
 I see element "[test=lose-output]"
 PASSED 

P3Cest: Validate form
Signature: Tests\Acceptance\P3Cest:validateForm
Test: tests/Acceptance/P3Cest.php:validateForm
Scenario --
 I am on page "/"
 I click "[test=submit-button]"
 I see element "[test=choice-validation]"
 PASSED 

P3Cest: Shows history and round details
Signature: Tests\Acceptance\P3Cest:showsHistoryAndRoundDetails
Test: tests/Acceptance/P3Cest.php:showsHistoryAndRoundDetails
Scenario --
 I am on page "/history"
 I grab multiple "[test=round-link]"
 There are 14 rounds
 I assert greater than or equal 10,14
 I grab text from "[test=round-link]"
 I click "2023-12-19 20:05:25"
 I see "2023-12-19 20:05:25"
 PASSED 

-----------------------------------------------------------------------------------------------------------------------------------------------------------------
Time: 00:00.438, Memory: 12.00 MB

OK (7 tests, 14 assertions)
```