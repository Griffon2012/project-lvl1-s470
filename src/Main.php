<?php
namespace BrainGames\Main;

use function cli\line;
use function cli\prompt;

function run($getGreeting, $getQuestionAndAnswer)
{
    line('Welcome to the Brain Games!');
    line($getGreeting());
    
    $userName = getName();

    line("Hello, %s!", $userName);

    $maxNumberWins = 3;

    for ($i = 0; $i < $maxNumberWins;) {
        $questionAndAnswer = $getQuestionAndAnswer();

        line('Question: %s', $questionAndAnswer['question']);

        $userAnswer = prompt('Your answer');
        
        if ($userAnswer === $questionAndAnswer['answer']) {
            $i++;
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $questionAndAnswer['answer']);
            line('Let\'s try again, %s!', $userName);
        }
    }

    line('Congratulations, %s', $userName);
}


function getName()
{
    $name = prompt('May I have your name?');
    return $name;
}
