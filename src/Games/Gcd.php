<?php
namespace BrainGames\Games\Gcd;

use function BrainGames\Main\getName;

function getGreeting()
{
    return 'Find the greatest common divisor of given numbers.';
}

function getQuestionAndAnswer()
{
    $value1 = rand(1, 100);
    $value2 = rand(1, 100);
    $expectedResponse = getGcd($value1, $value2);
   
    return ['question' => "$value1 $value2", 'answer' => (string) $expectedResponse];
}

function getGcd($value1, $value2)
{
    if ($value1 < $value2) {
        [$value1, $value2] = [$value2, $value1];
    }

    for ($i = 1; $i <= $value1; $i++) {
        if ($value1 % $i === 0) {
            if ($value2 % ($value1 / $i) === 0) {
                return $value1 / $i;
            }
        }
    }
}
