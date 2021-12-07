<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

use JetBrains\PhpStorm\Pure;

class HydrotermalCloud
{
    private Point $origin;
    private Point $end;

    /**
     * @param Point $origin
     * @param Point $end
     */
    public function __construct(Point $origin, Point $end)
    {
        if ($origin->getX() === $end->getX()) {
            if ($origin->getY() < $end->getY()) {
                $this->origin = $origin;
                $this->end = $end;
            } else {
                $this->origin = $end;
                $this->end = $origin;
            }
        } elseif ($origin->getY() === $end->getY()) {
            if ($origin->getX() < $end->getX()) {
                $this->origin = $origin;
                $this->end = $end;
            } else {
                $this->origin = $end;
                $this->end = $origin;
            }
        } else {
            if ($origin->getX() < $end->getX()) {
                $this->origin = $origin;
                $this->end = $end;
            } else {
                $this->origin = $end;
                $this->end = $origin;
            }
        }
    }

    /**
     * @return Point
     */
    public function getOrigin(): Point
    {
        return $this->origin;
    }

    /**
     * @return Point
     */
    public function getEnd(): Point
    {
        return $this->end;
    }

    public function getPoints(): array
    {
        $points = [];
        if ($this->isHorizontal()) {
            for ($i = $this->origin->getX(); $i <= $this->end->getX(); $i++) {
                $points[] = new Point($i, $this->origin->getY());
            }
        } elseif ($this->isVertical()) {
            for ($i = $this->origin->getY(); $i <= $this->end->getY(); $i++) {
                $points[] = new Point($this->origin->getX(), $i);
            }
        } else {
            for ($i = 0; $i <= $this->end->getX() - $this->origin->getX(); $i++) {
                $newYCoord = $this->origin->getY() + $i;
                if ($this->origin->getY() > $this->end->getY()) {
                    $newYCoord = $this->origin->getY() - $i;
                }

                $points[] = new Point($this->origin->getX() + $i, $newYCoord);
            }
        }

        return $points;
    }

    #[Pure] public function isVertical(): bool
    {
        return $this->origin->getX() === $this->end->getX();
    }

    #[Pure] public function isHorizontal(): bool
    {
        return $this->origin->getY() === $this->end->getY();
    }
}