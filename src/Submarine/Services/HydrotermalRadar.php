<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\HydrotermalCloud;
use Jdlcgarcia\Aoc2021\Submarine\Point;

class HydrotermalRadar
{
    protected const EMPTY = '.';
    /** @var HydrotermalCloud[]  */
    protected array $clouds = [];
    /** @var int[]  */
    protected array $matrix = [];
    protected Point $maxPoint;

    /**
     * @param HydrotermalCloud[] $clouds
     */
    public function __construct(array $clouds)
    {
        $this->resetGrid();
        $this->fillClouds();
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

    /**
     * @return void
     */
    private function fillClouds(): void
    {
        if (sizeof($this->clouds) > 0) {
            foreach ($this->clouds as $cloud) {
                foreach ($cloud->getPoints() as $point) {
                    if ($this->matrix[$point->getX()][$point->getY()] === '.') {
                        $this->matrix[$point->getX()][$point->getY()] = 1;
                    } else {
                        $this->matrix[$point->getX()][$point->getY()]++;
                    }
                }
            }
        }
    }

    /**
     * @return void
     */
    protected function resetGrid(): void
    {
        for ($y = 0; $y <= $this->maxPoint->getY(); $y++) {
            for ($x = 0; $x <= $this->maxPoint->getX(); $x++) {
                $this->matrix[$x][$y] = self::EMPTY;
            }
        }
    }
}