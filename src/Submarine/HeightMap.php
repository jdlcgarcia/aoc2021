<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Exceptions\PointDoesNotExistException;
use JetBrains\PhpStorm\Pure;

class HeightMap
{
    /** @var HeightPoint[][] */
    private array $points;

    /**
     * @param string[] $rows
     */
    public function __construct(array $rows)
    {
        foreach ($rows as $nthRow => $row) {
            $newRow = [];
            foreach (str_split($row) as $nthColumn => $value) {
                $newRow[] = new HeightPoint(new Point($nthColumn, $nthRow), $value);
            }
            $this->points[] = $newRow;
        }
    }

    /**
     * @return HeightPoint[][]
     */
    public function getPoints(): array
    {
        return $this->points;
    }

    /**
     * @throws PointDoesNotExistException
     */
    public function getPoint(int $x, int $y): HeightPoint
    {
        if (!isset($this->points[$y]) || !isset($this->points[$y][$x])) {
            throw new PointDoesNotExistException(new Point($x, $y));
        }
        return $this->points[$y][$x];
    }

    #[Pure] public function isLower(HeightPoint $a, HeightPoint $b): bool
    {
        $pointA = $this->points[$a->getPoint()->getY()][$a->getPoint()->getX()];
        if (!isset($this->points[$b->getPoint()->getY()]) || !isset($this->points[$b->getPoint()->getY()][$b->getPoint()->getX()])) {
            return true;
        }
        $pointB = $this->points[$b->getPoint()->getY()][$b->getPoint()->getX()];

        return ($pointA->getHeight() < $pointB->getHeight());
    }

    /**
     * @throws PointDoesNotExistException
     */
    public function getPointAtRight(HeightPoint $heightPoint): HeightPoint
    {
        return $this->getPoint($heightPoint->getPoint()->getX() + 1, $heightPoint->getPoint()->getY());
    }

    /**
     * @throws PointDoesNotExistException
     */
    public function getPointAtLeft(HeightPoint $heightPoint): HeightPoint
    {
        return $this->getPoint($heightPoint->getPoint()->getX() - 1, $heightPoint->getPoint()->getY());
    }

    /**
     * @throws PointDoesNotExistException
     */
    public function getPointAtTop(HeightPoint $heightPoint): HeightPoint
    {
        return $this->getPoint($heightPoint->getPoint()->getX(), $heightPoint->getPoint()->getY() - 1);
    }

    /**
     * @throws PointDoesNotExistException
     */
    public function getPointAtBottom(HeightPoint $heightPoint): HeightPoint
    {
        return $this->getPoint($heightPoint->getPoint()->getX(), $heightPoint->getPoint()->getY() + 1);
    }
}