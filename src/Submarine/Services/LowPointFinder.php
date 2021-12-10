<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\Exceptions\PointDoesNotExistException;
use Jdlcgarcia\Aoc2021\Submarine\HeightMap;

class LowPointFinder
{
    private HeightMap $heightMap;
    private array $lowPoints = [];
    private int $riskLevel = 0;

    /**
     * @param HeightMap $heightMap
     */
    public function __construct(HeightMap $heightMap)
    {
        $this->heightMap = $heightMap;
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
                }
            }
        }
    }
}