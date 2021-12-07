<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\HydrotermalCloud;
use Jdlcgarcia\Aoc2021\Submarine\Point;
use PHPUnit\Framework\TestCase;

class HydrotermalCloudTest extends TestCase
{
    public function testCreateHydrotermalCloud()
    {
        $hydrotermalCloud = new HydrotermalCloud(new Point(3, 4), new Point(1,4));

        $this->assertEquals($hydrotermalCloud->getPoints(), [new Point(1, 4), new Point(2, 4), new Point(3, 4)]);
    }
}