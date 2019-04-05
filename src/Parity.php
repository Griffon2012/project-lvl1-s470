<?php
namespace BrainGames\Parity;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\run as getName;

function run()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if number even otherwise answer "no".');
    $userName = getName();
    
    $countTrueGame = 0;
    
    while ($countTrueGame < 3) {
        if (game($userName)) {
            $countTrueGame++;
        }
    }

    line('Congratulations, %s', $userName);
}

function game($userName)
{
    $randNumber = rand(1, 100);
    line("Question: %s", $randNumber);
    $userAnswer = prompt('Your answer');
    $evenNumber = ($randNumber % 2) == 0;
    
    if (($evenNumber && $userAnswer === 'yes') || (!$evenNumber && $userAnswer === 'no')) {
        line('Correct!');
        return true;
    }
    
    $trueAnswer = $evenNumber ? "yes" : "no";
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $trueAnswer);
    line('Let\'s try again, %s!', $userName);
    return false;
}
