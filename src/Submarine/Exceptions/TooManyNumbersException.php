<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Exceptions;

use Exception;
use JetBrains\PhpStorm\Pure;

class TooManyNumbersException extends Exception
{
    #[Pure] public function __construct(array $row)
    {
        $this->message = 'There are too many numbers in this row: '.json_encode($row);

        parent::__construct();
    }
}