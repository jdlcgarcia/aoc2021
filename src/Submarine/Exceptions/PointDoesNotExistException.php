<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Exceptions;

use Exception;
use Jdlcgarcia\Aoc2021\Submarine\Point;

class PointDoesNotExistException extends Exception
{
    public function __construct(Point $point)
    {
        $this->message = 'The point in '.$point->toString().' does not exist';

        parent::__construct();
    }
}