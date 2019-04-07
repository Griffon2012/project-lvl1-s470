<?php
namespace BrainGames\Games\Progression;

use function BrainGames\Main\startGame;

const ANNOTATION = 'What number is missing in the progression?';
const LENGTH_PROGRESSION = 10;

function run()
{
    $getQuestionAndAnswer = function () {
        $step = rand(1, 5);
        $start = rand(1, 25);
        $hiddenIndexNumber = rand(0, (LENGTH_PROGRESSION - 1));
        $correctAnswer = (string) ($step * $hiddenIndexNumber + $start);
        $question = implode(' ', getProgressionWithHiddenElement($start, $step, $hiddenIndexNumber));
    
        return [$question, $correctAnswer];
    };

    startGame(ANNOTATION, $getQuestionAndAnswer);
}

function getProgressionWithHiddenElement($start, $step, $hiddenIndexNumber)
{
    $progression = [];
    for ($i = 0; $i < LENGTH_PROGRESSION; $i++) {
        if ($i === $hiddenIndexNumber) {
            $progression[] = '..';
        } else {
            $progression[] = (string) ($start + $step * $i);
        }
    }
    return $progression;
}
