<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class ComplexMeasurement
{
    private int $first;
    private int $middle;
    private int $last;

    public function __construct(int $first, int $middle, int $last)
    {
        $this->first = $first;
        $this->middle = $middle;
        $this->last = $last;
    }

    public function getValue(): int
    {
        return $this->first + $this->middle + $this->last;
    }
}