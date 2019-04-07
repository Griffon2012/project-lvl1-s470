<?php
namespace BrainGames\Games\Parity;

const GRETTING = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $getQuestionAndAnswer = function () {
        $question = rand(1, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
   
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    \BrainGames\Main\startGame(GRETTING, $getQuestionAndAnswer);
}

function isEven($number)
{
    return ($number % 2) == 0;
}
