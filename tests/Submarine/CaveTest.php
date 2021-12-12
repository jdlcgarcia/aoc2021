<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Cave;
use PHPUnit\Framework\TestCase;

class CaveTest extends TestCase
{
    public function testCreateCaveAndConnections()
    {
        $caveA = new Cave('A');
        $caveB = new Cave('B');
        $caveC = new Cave('C');
        $caveA->connect($caveB);
        $caveB->connect($caveC);
        $this->assertEquals('A', $caveA->getLabel());
        $this->assertEquals('B', $caveB->getLabel());
        $this->assertEquals('C', $caveC->getLabel());
        $this->assertCount(1, $caveA->getConnections());
        $this->assertCount(2, $caveB->getConnections());
        $this->assertCount(1, $caveC->getConnections());
    }
}