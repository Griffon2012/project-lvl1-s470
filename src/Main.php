<?php
namespace BrainGames\Main;

use function cli\line;
use function cli\prompt;

const MAX_COUNT_WINS = 3;

function startGame($greeting, $getQuestionAndAnswer)
{
    line('Welcome to the Brain Games!');
    line($greeting);

    $userName = prompt('May I have your name?');

    line("Hello, %s!", $userName);

    $countWin = 0;

    while ($countWin < MAX_COUNT_WINS) {
        $questionAndAnswer = call_user_func($getQuestionAndAnswer);
        $question = $questionAndAnswer['question'];
        $correctAnswer = $questionAndAnswer['correctAnswer'];

        line('Question: %s', $question);

        $userAnswer = prompt('Your answer');
        
        if ($userAnswer === $correctAnswer) {
            line('Correct!');
            $countWin++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $questionAndAnswer['correctAnswer']);
            line('Let\'s try again, %s!', $userName);
        }
    }

    line('Congratulations, %s', $userName);
}
