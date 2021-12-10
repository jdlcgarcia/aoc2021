<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Exceptions\PointDoesNotExistException;
use Jdlcgarcia\Aoc2021\Submarine\HeightMap;
use Jdlcgarcia\Aoc2021\Submarine\HeightPoint;
use Jdlcgarcia\Aoc2021\Submarine\Point;
use PHPUnit\Framework\TestCase;

class HeightMapTest extends TestCase
{
    public function testCreateHeatMap()
    {
        $heightMapInput = [
            '2199943210',
            '3987894921',
            '9856789892',
            '8767896789',
            '9899965678',
        ];

        $heightMap = new HeightMap($heightMapInput);
        $this->assertEquals(new HeightPoint(new Point (0 , 0), 2), $heightMap->getPoint(0, 0));
        $this->assertEquals(new HeightPoint(new Point (9 , 4), 8), $heightMap->getPoint(9, 4));
        $this->assertEquals(new HeightPoint(new Point (4 , 2), 7), $heightMap->getPoint(4, 2));
        $this->assertEquals(new HeightPoint(new Point (1 , 0), 1), $heightMap->getPointAtRight($heightMap->getPoint(0, 0)));
        $this->assertEquals(new HeightPoint(new Point (8 , 4), 7), $heightMap->getPointAtLeft($heightMap->getPoint(9, 4)));
        $this->assertEquals(new HeightPoint(new Point (9 , 3), 9), $heightMap->getPointAtTop($heightMap->getPoint(9, 4)));
        $this->assertEquals(new HeightPoint(new Point (0 , 1), 3), $heightMap->getPointAtBottom($heightMap->getPoint(0, 0)));
        $this->expectException(PointDoesNotExistException::class);
        $this->assertEquals(new HeightPoint(new Point (1 , 0), 1), $heightMap->getPointAtLeft($heightMap->getPoint(0, 0)));
        $this->expectException(PointDoesNotExistException::class);
        $this->assertEquals(new HeightPoint(new Point (1 , 0), 1), $heightMap->getPointAtRight($heightMap->getPoint(9, 4)));
        $this->expectException(PointDoesNotExistException::class);
        $this->assertEquals(new HeightPoint(new Point (1 , 0), 1), $heightMap->getPointAtTop($heightMap->getPoint(0, 0)));
        $this->expectException(PointDoesNotExistException::class);
        $this->assertEquals(new HeightPoint(new Point (1 , 0), 1), $heightMap->getPointAtBottom($heightMap->getPoint(9, 4)));
    }
}