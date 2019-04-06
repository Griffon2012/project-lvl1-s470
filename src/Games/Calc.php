<?php
namespace BrainGames\Games\Calc;

use function BrainGames\getName;

function getGreeting()
{
    return 'What is the result of the expression?';
}

function getQuestionAndAnswer()
{
    $value1 = rand(1, 100);
    $value2 = rand(1, 100);
    $numberAction = rand(1, 3);
    $action = getAction($numberAction);

    $expectedResponse = (string) calc($value1, $value2, $action);
    
    $question = "$value1 $action $value2";

    return ['question' => $question, 'answer' => $expectedResponse];
}

function getAction($numberAction)
{
    switch ($numberAction) {
        case 1:
            return '+';
        case 2:
            return '-';
        case 3:
            return '*';
    }
}

function calc($value1, $value2, $action)
{
    switch ($action) {
        case '+':
            return $value1 + $value2;
        case '-':
            return $value1 - $value2;
        case '*':
            return $value1 * $value2;
    }
}
