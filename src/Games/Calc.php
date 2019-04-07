<?php
namespace BrainGames\Games\Calc;

use function BrainGames\getName;

const ACTIONS = ["+", "-", "*"];
const GRETTING = 'What is the result of the expression?';

function run()
{
    $getQuestionAndAnswer = function () {
        $value1 = rand(1, 100);
        $value2 = rand(1, 100);
        $action = getRandAction();
    
        $correctAnswer = (string) calc($value1, $value2, $action);
        
        $question = "$value1 $action $value2";
    
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    \BrainGames\Main\startGame(GRETTING, $getQuestionAndAnswer);
}

function getRandAction()
{
    return ACTIONS[rand(0, count(ACTIONS) - 1)];
}

function calc($value1, $value2, $action)
{
    switch ($action) {
        case ACTIONS[0]:
            return $value1 + $value2;
        case ACTIONS[1]:
            return $value1 - $value2;
        case ACTIONS[2]:
            return $value1 * $value2;
    }
}
