<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class P3Cest
{
    // Game tests
    public function testRock(AcceptanceTester $I)
    {
       $I->amOnPage('/');
       $I->fillField('[test=rock-radio]', 'rock');
       $I->click('[test=submit-button]');
       $I->seeElement('[test=results-div]');

       $player_choice = $I->grabTextFrom('[test=player-choice]');
       $I->comment('The player chose '.$player_choice);
       
       $opp_choice = $I->grabTextFrom('[test=opp-choice]');
       $I->comment('The player chose '.$opp_choice);

       if ($player_choice === 'Rock') {
            if ($opp_choice === 'Scissors' || $opp_choice === 'Lizard') {
                $I->seeElement('[test=win-output]');
            } elseif ($opp_choice === 'Paper' || $opp_choice === 'Spock') {
                $I->seeElement('[test=lose-output]');
            } else {
                $I->seeElement('[test=tie-output]');
            }
        }
    }

    public function testPaper(AcceptanceTester $I)
    {
       $I->amOnPage('/');
       $I->fillField('[test=paper-radio]', 'paper');
       $I->click('[test=submit-button]');
       $I->seeElement('[test=results-div]');

       $player_choice = $I->grabTextFrom('[test=player-choice]');
       $I->comment('The player chose '.$player_choice);
       
       $opp_choice = $I->grabTextFrom('[test=opp-choice]');
       $I->comment('The player chose '.$opp_choice);

       if ($player_choice === 'Paper') {
            if ($opp_choice === 'Rock' || $opp_choice === 'Spock') {
                $I->seeElement('[test=win-output]');
            } elseif ($opp_choice === 'Scissors' || $opp_choice === 'Lizard') {
                $I->seeElement('[test=lose-output]');
            } else {
                $I->seeElement('[test=tie-output]');
            }
        }
    }

    public function testScissors(AcceptanceTester $I)
    {
       $I->amOnPage('/');
       $I->fillField('[test=scissors-radio]', 'scissors');
       $I->click('[test=submit-button]');
       $I->seeElement('[test=results-div]');

       $player_choice = $I->grabTextFrom('[test=player-choice]');
       $I->comment('The player chose '.$player_choice);
       
       $opp_choice = $I->grabTextFrom('[test=opp-choice]');
       $I->comment('The player chose '.$opp_choice);

       if ($player_choice === 'Scissors') {
            if ($opp_choice === 'Paper' || $opp_choice === 'Lizard') {
                $I->seeElement('[test=win-output]');
            } elseif ($opp_choice === 'Rock' || $opp_choice === 'Spock') {
                $I->seeElement('[test=lose-output]');
            } else {
                $I->seeElement('[test=tie-output]');
            }
        }
    }

    public function testLizard(AcceptanceTester $I)
    {
       $I->amOnPage('/');
       $I->fillField('[test=lizard-radio]', 'lizard');
       $I->click('[test=submit-button]');
       $I->seeElement('[test=results-div]');

       $player_choice = $I->grabTextFrom('[test=player-choice]');
       $I->comment('The player chose '.$player_choice);
       
       $opp_choice = $I->grabTextFrom('[test=opp-choice]');
       $I->comment('The player chose '.$opp_choice);

       if ($player_choice === 'Lizard') {
            if ($opp_choice === 'Paper' || $opp_choice === 'Spock') {
                $I->seeElement('[test=win-output]');
            } elseif ($opp_choice === 'Scissors' || $opp_choice === 'Rock') {
                $I->seeElement('[test=lose-output]');
            } else {
                $I->seeElement('[test=tie-output]');
            }
        }
    }

    public function testSpock(AcceptanceTester $I)
    {
       $I->amOnPage('/');
       $I->fillField('[test=spock-radio]', 'spock');
       $I->click('[test=submit-button]');
       $I->seeElement('[test=results-div]');

       $player_choice = $I->grabTextFrom('[test=player-choice]');
       $I->comment('The player chose '.$player_choice);

       $opp_choice = $I->grabTextFrom('[test=opp-choice]');
       $I->comment('The player chose '.$opp_choice);

       if ($player_choice === 'Spock') {
            if ($opp_choice === 'Rock' || $opp_choice === 'Scissors') {
                $I->seeElement('[test=win-output]');
            } elseif ($opp_choice === 'Paper' || $opp_choice === 'Lizard') {
                $I->seeElement('[test=lose-output]');
            } else {
                $I->seeElement('[test=tie-output]');
            }
        }
    }

    // Form validation test
    public function validateForm(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('[test=submit-button]');
        $I->seeElement('[test=choice-validation]');
    }

    // History and Round Details test
    public function showsHistoryAndRoundDetails(AcceptanceTester $I)
    {
        $I->amOnPage(('/history'));

        $round_count = count($I->grabMultiple('[test=round-link]'));
        $I->comment('There are '.$round_count.' rounds');

        $I->assertGreaterThanOrEqual(10, $round_count);

        $timestamp = $I->grabTextFrom('[test=round-link]');
        $I->click($timestamp);
        $I->see($timestamp);
        
    }
}