<?php
namespace BrainGames\Cli;

use function cli\line,
	     cli\prompt;

function run()
{
  line('Welcome to the Brain Game!');
  $name = prompt('May I have your name?');
  line("Hello, %s!", $name);
}


