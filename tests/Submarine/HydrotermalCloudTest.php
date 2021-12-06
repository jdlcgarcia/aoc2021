<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\HydrotermalCloud;
use Jdlcgarcia\Aoc2021\Submarine\Point;
use PHPUnit\Framework\TestCase;

class HydrotermalCloudTest extends TestCase
{
    public function testCreateHydrotermalCloud()
    {
        $hydrotermalCloud = new HydrotermalCloud(new Point(1, 1), new Point(1,3));

        $this->assertEquals($hydrotermalCloud->getPoints(), [new Point(1, 1), new Point(1, 2), new Point(1, 3)]);
    }
}