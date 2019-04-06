<?php
namespace BrainGames\Games\Parity;

function getGreeting()
{
    return 'Answer "yes" if number even otherwise answer "no".';
}

function getQuestionAndAnswer()
{
    $question = rand(1, 100);
    $expectedResponse = isEven($question) ? 'yes' : 'no';
   
    return ['question' => $question, 'answer' => $expectedResponse];
}

function isEven($number)
{
    return ($number % 2) == 0;
}
