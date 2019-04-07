<?php
namespace BrainGames\Games\Prime;

use function BrainGames\Main\startGame;

const ANNOTATION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run()
{
    $getQuestionAndAnswer = function () {
        $question = rand(1, 500);
    
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
    
        return [$question, $correctAnswer];
    };

    startGame(ANNOTATION, $getQuestionAndAnswer);
}

function isPrime($number)
{
    if ($number <= 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
