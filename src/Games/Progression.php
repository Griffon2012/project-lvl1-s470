<?php
namespace BrainGames\Games\Progression;

function getGreeting()
{
    return 'What number is missing in the progression?';
}

function getQuestionAndAnswer()
{
    $countElementInProgression = 10;
    $stepProgression = rand(1, 5);
    $firstElement = rand(1, 25);
    $numberDeleteElement = rand(1, $countElementInProgression);

    $expectedResponse = $stepProgression * ($numberDeleteElement - 1) + $firstElement;

    $question = getStringWithoutElement($firstElement, $stepProgression, $countElementInProgression, $numberDeleteElement);

    return ['question' => $question, 'answer' => (string) $expectedResponse];
}

function getStringWithoutElement($firstElement, $stepProgression, $countElementInProgression, $numberDeleteElement)
{
    $lastElement = $firstElement + ($stepProgression * ($countElementInProgression - 1));
    $progression = [];
    for ($i = $firstElement; $i <= $lastElement; $i += $stepProgression) {
        if (count($progression) === $numberDeleteElement - 1) {
            $progression[] = '..';
        } else {
            $progression[] = (string) $i;
        }
    }
    return implode(' ', $progression);
}
