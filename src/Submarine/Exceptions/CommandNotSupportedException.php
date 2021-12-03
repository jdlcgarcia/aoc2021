<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Exceptions;

use Exception;
use JetBrains\PhpStorm\Pure;

class CommandNotSupportedException extends Exception
{

    #[Pure] public function __construct(string $command)
    {
        $this->message = 'The command '.$command.' is not supported';

        parent::__construct();
    }
}