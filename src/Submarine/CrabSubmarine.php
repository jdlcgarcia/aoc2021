<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class CrabSubmarine
{
    private int $position;

    /**
     * @param int $position
     */
    public function __construct(int $position)
    {
        $this->position = $position;
    }

    public function move(int $position): int
    {
        return abs($this->position - $position);
    }

    public function getPosition(): int
    {
        return $this->position;
    }
}