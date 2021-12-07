<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\HydrotermalCloud;
use Jdlcgarcia\Aoc2021\Submarine\Point;

class HydrotermalRadar
{
    private const EMPTY = '.';
    /** @var HydrotermalCloud[]  */
    private array $clouds = [];
    /** @var int[]  */
    private array $matrix = [];
    private Point $maxPoint;

    /**
     * @param HydrotermalCloud[] $clouds
     */
    public function __construct(array $clouds)
    {
        $this->maxPoint = new Point();
        foreach($clouds as $cloud) {
            if ($cloud->isHorizontal() || $cloud->isVertical()) {
                $this->clouds[] = $cloud;

                if ($cloud->getOrigin()->getX() > $this->maxPoint->getX()) {
                    $this->maxPoint->setX($cloud->getOrigin()->getX());
                }
                if ($cloud->getEnd()->getX() > $this->maxPoint->getX()) {
                    $this->maxPoint->setX($cloud->getEnd()->getX());
                }
                if ($cloud->getOrigin()->getY() > $this->maxPoint->getY()) {
                    $this->maxPoint->setY($cloud->getOrigin()->getY());
                }
                if ($cloud->getEnd()->getY() > $this->maxPoint->getY()) {
                    $this->maxPoint->setY($cloud->getEnd()->getY());
                }
            }
        }

        for ($y = 0; $y <= $this->maxPoint->getY(); $y++) {
            for ($x = 0; $x <= $this->maxPoint->getX(); $x++) {
                $this->matrix[$x][$y] = self::EMPTY;
            }
        }

        if (sizeof($this->clouds) > 0) {
            foreach ($this->clouds as $cloud) {
                foreach($cloud->getPoints() as $point) {
                    if ($this->matrix[$point->getX()][$point->getY()] === '.') {
                        $this->matrix[$point->getX()][$point->getY()] = 1;
                    } else {
                        $this->matrix[$point->getX()][$point->getY()]++;
                    }
                }
            }
        }
    }

    public function draw()
    {
        for ($y = 0; $y <= $this->maxPoint->getY(); $y++) {
            for ($x = 0; $x <= $this->maxPoint->getX(); $x++) {
                echo $this->matrix[$x][$y];
            }
            echo PHP_EOL;
        }
    }

    public function getOverlappingPositions(): int
    {
        $overlappingPositions = 0;
        for ($y = 0; $y <= $this->maxPoint->getY(); $y++) {
            for ($x = 0; $x <= $this->maxPoint->getX(); $x++) {
                if ($this->matrix[$x][$y] > 1) {
                    $overlappingPositions++;
                }
            }
        }

        return $overlappingPositions;
    }
}