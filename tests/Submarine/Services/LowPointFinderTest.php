<?php

namespace Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\HeightMap;
use Jdlcgarcia\Aoc2021\Submarine\HeightPoint;
use Jdlcgarcia\Aoc2021\Submarine\Point;
use Jdlcgarcia\Aoc2021\Submarine\Services\LowPointFinder;
use PHPUnit\Framework\TestCase;

class LowPointFinderTest extends TestCase
{
    public function testFindLowPointsInSmallHeightMap()
    {
        $heightMapInput = [
            '21',
            '39',
        ];
        $finder = new LowPointFinder(new HeightMap($heightMapInput));
        $lowPoints = $finder->getLowPoints();
        $this->assertEquals([new HeightPoint(new Point(1, 0), 1)], $lowPoints);
        $this->assertEquals(2, $finder->getRiskLevel());
    }

    public function testFindLowPointsInBigHeightMap()
    {
        $heightMapInput = [
            '2199943210',
            '3987894921',
            '9856789892',
            '8767896789',
            '9899965678',
        ];
        $finder = new LowPointFinder(new HeightMap($heightMapInput));
        $lowPoints = $finder->getLowPoints();
        $this->assertEquals([
            new HeightPoint(new Point(1, 0), 1),
            new HeightPoint(new Point(9, 0), 0),
            new HeightPoint(new Point(2, 2), 5),
            new HeightPoint(new Point(6, 4), 5)
        ], $lowPoints);
        $this->assertEquals(15, $finder->getRiskLevel());
    }
}