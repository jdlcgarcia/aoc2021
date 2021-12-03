<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Exceptions\CommandNotSupportedException;

class Position
{
    const FORWARD = 'forward';
    const UP = 'up';
    const DOWN = 'down';

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

    /**
     * @throws CommandNotSupportedException
     */
    public function move(string $direction, int $distance)
    {
        switch($direction){
            case self::FORWARD:
                $this->moveForward($distance);
                break;
            case self::UP:
                $this->moveUp($distance);
                break;
            case self::DOWN:
                $this->moveDown($distance);
                break;
            default:
                throw new CommandNotSupportedException($direction);
        }
    }


    private function moveForward(int $x): void
    {
        $this->horizontal += $x;
    }

    private function moveUp(int $x): void
    {
        $this->depth -= $x;
    }

    private function moveDown(int $x): void
    {
        $this->depth += $x;
    }
}