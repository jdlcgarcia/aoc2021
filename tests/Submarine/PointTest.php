<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Point;
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase
{
    public function testCreatePoint()
    {
        $point = new Point(1, 2);
        $this->assertEquals(1, $point->getX());
        $this->assertEquals(2, $point->getY());
    }

    public function testCreatePointWithNegativeData()
    {
        $point = new Point(-1, 2);
        $this->assertEquals(-1, $point->getX());
        $this->assertEquals(2, $point->getY());
    }
}