<?php

namespace Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\HydrotermalCloud;
use Jdlcgarcia\Aoc2021\Submarine\Point;
use Jdlcgarcia\Aoc2021\Submarine\Services\Hydrotermal90DegreeRadar;
use PHPUnit\Framework\TestCase;

class Hydrotermal90DegreeRadarTest extends TestCase
{
    public function testDemoInput()
    {
        $clouds = [
            new HydrotermalCloud(new Point(0, 9), new Point(5, 9)),
            new HydrotermalCloud(new Point(8, 0), new Point(0, 8)),
            new HydrotermalCloud(new Point(9, 4), new Point(3, 4)),
            new HydrotermalCloud(new Point(2, 2), new Point(2, 1)),
            new HydrotermalCloud(new Point(7, 0), new Point(7, 4)),
            new HydrotermalCloud(new Point(6, 4), new Point(2, 0)),
            new HydrotermalCloud(new Point(0, 9), new Point(2, 9)),
            new HydrotermalCloud(new Point(3, 4), new Point(1, 4)),
            new HydrotermalCloud(new Point(0, 0), new Point(8, 8)),
            new HydrotermalCloud(new Point(5, 5), new Point(8, 2)),
        ];
        $service = new Hydrotermal90DegreeRadar($clouds);
        $this->assertEquals(5, $service->getOverlappingPositions());
    }
}