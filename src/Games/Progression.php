<?php
namespace BrainGames\Games\Progression;

function getGreeting()
{
    return 'What number is missing in the progression?';
}

function getQuestionAndAnswer()
{
    $countElemInProgression = 10;
    $step = rand(1, 5);
    $firstElement = rand(1, 25);
    $numberDeleteElem = rand(1, $countElemInProgression);

    $expectedResponse = $step * ($numberDeleteElem - 1) + $firstElement;

    $question = getStringWithoutElement($firstElement, $step, $countElemInProgression, $numberDeleteElem);

    return ['question' => $question, 'answer' => (string) $expectedResponse];
}

function getStringWithoutElement($firstElement, $step, $countElemInProgression, $numberDeleteElem)
{
    $lastElement = $firstElement + ($step * ($countElemInProgression - 1));
    $progression = [];
    for ($i = $firstElement; $i <= $lastElement; $i += $step) {
        if (count($progression) === $numberDeleteElem - 1) {
            $progression[] = '..';
        } else {
            $progression[] = (string) $i;
        }
    }
    return implode(' ', $progression);
}
