<?php
namespace BrainGames\Games\Parity;

use function BrainGames\Main\startGame;

const ANNOTATION = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $getQuestionAndAnswer = function () {
        $question = rand(1, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
   
        return [$question, $correctAnswer];
    };

    startGame(ANNOTATION, $getQuestionAndAnswer);
}

function isEven($number)
{
    return ($number % 2) == 0;
}
