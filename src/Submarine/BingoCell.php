<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class BingoCell
{
    private int $value;
    private bool $marked = false;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function mark()
    {
        $this->marked = true;
    }

    public function isMarked(): bool
    {
        return $this->marked;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}