<?php
namespace BrainGames\Games\Gcd;

const GRETTING = 'Find the greatest common divisor of given numbers.';

function run()
{
    $getQuestionAndAnswer = function () {
        $value1 = rand(1, 100);
        $value2 = rand(1, 100);
        $correctAnswer = (string) getGcd($value1, $value2);
   
        return ['question' => "$value1 $value2", 'correctAnswer' => $correctAnswer];
    };

    \BrainGames\Main\startGame(GRETTING, $getQuestionAndAnswer);
}

function getGcd($value1, $value2)
{
    if ($value1 == $value2) {
        return $value1;
    } else {
        $min = min($value1, $value2);
        $diff = abs($value1 - $value2);
        return getGcd($min, $diff);
    }
}
