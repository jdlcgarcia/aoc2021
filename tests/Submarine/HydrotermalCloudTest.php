<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\HydrotermalCloud;
use Jdlcgarcia\Aoc2021\Submarine\Point;
use PHPUnit\Framework\TestCase;

class HydrotermalCloudTest extends TestCase
{
    public function testCreateVerticalHydrotermalCloud()
    {
        $hydrotermalCloud = new HydrotermalCloud(new Point(3, 4), new Point(1,4));

        $this->assertEquals($hydrotermalCloud->getPoints(), [new Point(1, 4), new Point(2, 4), new Point(3, 4)]);
    }

    public function testCreateHorizontalHydrotermalCloud()
    {
        $hydrotermalCloud = new HydrotermalCloud(new Point(1, 1), new Point(1,3));

        $this->assertEquals($hydrotermalCloud->getPoints(), [new Point(1, 1), new Point(1, 2), new Point(1, 3)]);
    }

    public function testCreateDiagonalHydrotermalCloud()
    {
        $hydrotermalCloud = new HydrotermalCloud(new Point(1, 1), new Point(3,3));

        $this->assertEquals($hydrotermalCloud->getPoints(), [new Point(1, 1), new Point(2, 2), new Point(3, 3)]);
    }

    public function testCreateReverseDiagonalHydrotermalCloud()
    {
        $hydrotermalCloud = new HydrotermalCloud(new Point(9, 7), new Point(7,9));

        $this->assertEquals($hydrotermalCloud->getPoints(), [new Point(7, 9), new Point(8, 8), new Point(9, 7)]);
    }
}