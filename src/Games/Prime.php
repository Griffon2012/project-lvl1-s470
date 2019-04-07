<?php
namespace BrainGames\Games\Prime;

const GRETTING = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run()
{
    $getQuestionAndAnswer = function () {
        $question = rand(1, 500);
    
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
    
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    \BrainGames\Main\startGame(GRETTING, $getQuestionAndAnswer);
}

function isPrime($number)
{
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
