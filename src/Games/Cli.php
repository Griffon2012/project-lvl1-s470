<?php
namespace BrainGames\Games\Cli;

use function cli\line;
use function cli\prompt;
use function BrainGames\Main\getName;

function run()
{
    line('Welcome to the Brain Game!');
    $name = getName();
    line("Hello, %s!", $name);
}
