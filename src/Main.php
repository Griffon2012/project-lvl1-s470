<?php
namespace BrainGames\Main;

use function cli\line;
use function cli\prompt;

const MAX_COUNT_WINS = 3;

function startGame($annotation, $getQuestionAndAnswer)
{
    line('Welcome to the Brain Games!');
    line($annotation);

    $userName = prompt('May I have your name?');

    line("Hello, %s!", $userName);

    for ($i = 0; $i < MAX_COUNT_WINS; $i++) {
        $questionAndAnswer = $getQuestionAndAnswer();
        [$question, $correctAnswer] = $questionAndAnswer;

        line('Question: %s', $question);

        $userAnswer = prompt('Your answer');
        
        if ($userAnswer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line('Let\'s try again, %s!', $userName);
            return false;
        }
    }

    line('Congratulations, %s', $userName);
}
