<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\Position;
use Jdlcgarcia\Aoc2021\Submarine\PositionInterface;
use JetBrains\PhpStorm\Pure;

class MoveService
{
    const SEPARATOR = ' ';
    private $position;

    public function __construct(PositionInterface $position)
    {
        $this->position = $position;
    }

    public function processMove(string $line)
    {
        if ('' !== $line) {
            list($direction, $distance) = explode(self::SEPARATOR, $line);

            $this->position->move($direction, $distance);
        }
    }

    #[Pure] public function getScalarPosition(): int
    {
        return $this->position->getHorizontal() * $this->position->getDepth();
    }
}