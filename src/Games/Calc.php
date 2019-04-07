<?php
namespace BrainGames\Games\Calc;

use function BrainGames\getName;
use function BrainGames\Main\startGame;

const ACTIONS = ["+", "-", "*"];
const ANNOTATION = 'What is the result of the expression?';

function run()
{
    $getQuestionAndAnswer = function () {
        $value1 = rand(1, 100);
        $value2 = rand(1, 100);
        $action = getRandAction();
    
        $correctAnswer = (string) calc($value1, $value2, $action);
        
        $question = "$value1 $action $value2";
    
        return [$question, $correctAnswer];
    };

    startGame(ANNOTATION, $getQuestionAndAnswer);
}

function getRandAction()
{
    return ACTIONS[rand(0, count(ACTIONS) - 1)];
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
