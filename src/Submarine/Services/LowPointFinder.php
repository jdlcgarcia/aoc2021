<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\Exceptions\PointDoesNotExistException;
use Jdlcgarcia\Aoc2021\Submarine\HeightMap;
use Jdlcgarcia\Aoc2021\Submarine\HeightPoint;

class LowPointFinder
{
    private HeightMap $heightMap;
    private HeightMap $draftMap;
    private array $lowPoints = [];
    private int $riskLevel = 0;
    private array $basins = [];

    /**
     * @param HeightMap $heightMap
     * @param HeightMap $draftMap
     */
    public function __construct(HeightMap $heightMap, HeightMap $draftMap)
    {
        $this->heightMap = $heightMap;
        $this->draftMap = $draftMap;
        $this->findLowPoints();
    }

    public function getLowPoints(): array
    {
        return $this->lowPoints;
    }

    public function getRiskLevel(): int
    {
        return $this->riskLevel;
    }

    /**
     * @return void
     * @throws PointDoesNotExistException
     */
    private function findLowPoints(): void
    {
        foreach ($this->heightMap->getPoints() as $pointRow) {
            foreach ($pointRow as $heightPoint) {
                $countMinimum = 0;
                try {
                    $right = $this->heightMap->getPointAtRight($heightPoint);
                    if ($this->heightMap->isLower($heightPoint, $right)) {
                        $countMinimum++;
                    }
                } catch (PointDoesNotExistException $e) {
                    $countMinimum++;
                }
                try {
                    $left = $this->heightMap->getPointAtLeft($heightPoint);
                    if ($this->heightMap->isLower($heightPoint, $left)) {
                        $countMinimum++;
                    }
                } catch (PointDoesNotExistException $e) {
                    $countMinimum++;
                }
                try {
                    $top = $this->heightMap->getPointAtTop($heightPoint);
                    if ($this->heightMap->isLower($heightPoint, $top)) {
                        $countMinimum++;
                    }
                } catch (PointDoesNotExistException $e) {
                    $countMinimum++;
                }
                try {
                    $bottom = $this->heightMap->getPointAtBottom($heightPoint);
                    if ($this->heightMap->isLower($heightPoint, $bottom)) {
                        $countMinimum++;
                    }
                } catch (PointDoesNotExistException $e) {
                    $countMinimum++;
                }
                if ($countMinimum === 4) {
                    $this->lowPoints[] = $heightPoint;
                    $this->riskLevel += 1 + $heightPoint->getHeight();
                    $this->basins[] = $this->findSizeOfBasin($heightPoint);
                }
            }
        }
    }

    public function getThreeWorstBasins(): int
    {
        sort($this->basins);
        $this->basins = array_reverse($this->basins);
        $threeWorstSize = 1;
        if (isset($this->basins[0])) {
            $threeWorstSize *= $this->basins[0];
        }
        if (isset($this->basins[1])) {
            $threeWorstSize *= $this->basins[1];
        }
        if (isset($this->basins[2])) {
            $threeWorstSize *= $this->basins[2];
        }

        return $threeWorstSize;
    }

    private function findSizeOfBasin(HeightPoint $point): int
    {
        $sizeOfBasin = 1;
        $workingPoint = $this->draftMap->getPoint($point->getPoint()->getX(), $point->getPoint()->getY());
        $workingPoint->setHeight(9);
        try {
            $right = $this->draftMap->getPointAtRight($workingPoint);
            if ($right->getHeight() != 9) {
                $sizeOfBasin += $this->findSizeOfBasin($right);
            }
        } catch (PointDoesNotExistException $e) {}

        try {
            $left = $this->draftMap->getPointAtLeft($workingPoint);
            if ($left->getHeight() != 9) {
                $sizeOfBasin += $this->findSizeOfBasin($left);
            }
        } catch (PointDoesNotExistException $e) {}

        try {
            $top = $this->draftMap->getPointAtTop($workingPoint);
            if ($top->getHeight() != 9) {
                $sizeOfBasin += $this->findSizeOfBasin($top);
            }
        } catch (PointDoesNotExistException $e) {}

        try {
            $bottom = $this->draftMap->getPointAtBottom($workingPoint);
            if ($bottom->getHeight() != 9) {
                $sizeOfBasin += $this->findSizeOfBasin($bottom);
            }
        } catch (PointDoesNotExistException $e) {}

        return $sizeOfBasin;
    }
}