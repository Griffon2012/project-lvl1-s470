<?php
namespace BrainGames\Games\Progression;

const GRETTING = 'What number is missing in the progression?';
const COUNT_ELEMENT = 10;

function run()
{
    $getQuestionAndAnswer = function () {
        $step = rand(1, 5);
        $firstElement = rand(1, 25);
        $hiddenIndexNumber = rand(0, (COUNT_ELEMENT - 1));
    
        $correctAnswer = (string) ($step * $hiddenIndexNumber + $firstElement);
    
        $question = implode(' ', getProgressionWithHiddenElement($firstElement, $step, $hiddenIndexNumber));
    
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    \BrainGames\Main\startGame(GRETTING, $getQuestionAndAnswer);
}

function getProgressionWithHiddenElement($firstElement, $step, $hiddenIndexNumber)
{
    $progression = [];
    for ($i = 0; $i < COUNT_ELEMENT; $i++) {
        if ($i === $hiddenIndexNumber) {
            $progression[] = '..';
        } else {
            $progression[] = (string) ($firstElement + $step * $i);
        }
    }
    return $progression;
}
