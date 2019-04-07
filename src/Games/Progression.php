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
        $progression = getProgression($start, $step);
        $hiddenIndexNumber = array_rand($progression);
        $correctAnswer = $progression[$hiddenIndexNumber];
        $progressionWithHiddenElement = array_replace($progression, [$hiddenIndexNumber => '..']);
        $question = implode(' ', $progressionWithHiddenElement);
    
        return [$question, $correctAnswer];
    };

    startGame(ANNOTATION, $getQuestionAndAnswer);
}

function getProgression($start, $step)
{
    $progression = [];
    for ($i = 0; $i < LENGTH_PROGRESSION; $i++) {
        $progression[] = (string) ($start + $step * $i);
    }
    return $progression;
}
