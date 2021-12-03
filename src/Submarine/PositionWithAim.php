<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Exceptions\CommandNotSupportedException;

class PositionWithAim implements PositionInterface
{
    private int $horizontal;
    private int $depth;
    private int $aim;

    /**
     * @param int $horizontal
     * @param int $depth
     */
    public function __construct(int $horizontal = 0, int $depth = 0, int $aim = 0)
    {
        $this->horizontal = $horizontal;
        $this->depth = $depth;
        $this->aim = $aim;
    }

    public function getHorizontal(): int
    {
        return $this->horizontal;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function getAim(): int
    {
        return $this->aim;
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
        $this->depth += $x * $this->aim;
    }

    private function moveUp(int $x): void
    {
        $this->aim -= $x;
    }

    private function moveDown(int $x): void
    {
        $this->aim += $x;
    }
}