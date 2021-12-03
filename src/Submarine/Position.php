<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class Position
{
    private int $horizontal;
    private int $depth;

    /**
     * @param int $horizontal
     * @param int $depth
     */
    public function __construct(int $horizontal = 0, int $depth = 0)
    {
        $this->horizontal = $horizontal;
        $this->depth = $depth;
    }

    public function getHorizontal(): int
    {
        return $this->horizontal;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function getPosition(): int
    {
        return $this->horizontal * $this->depth;
    }


    public function moveForward(int $x): void
    {
        $this->horizontal += $x;
    }

    public function moveUp(int $x): void
    {
        $this->depth -= $x;
    }

    public function moveDown(int $x): void
    {
        $this->depth += $x;
    }
}