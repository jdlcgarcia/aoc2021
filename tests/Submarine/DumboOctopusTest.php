<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\DumboOctopus;
use PHPUnit\Framework\TestCase;

class DumboOctopusTest extends TestCase
{
    public function testCreateOctopusAndMakeItShine()
    {
        $octopus = new DumboOctopus(5);
        $octopus->step();
        $this->assertEquals(6, $octopus->getEnergyLevel());
        $this->assertFalse($octopus->isFlash());
        $octopus->step();
        $octopus->step();
        $octopus->step();
        $octopus->step();
        $this->assertEquals(0, $octopus->getEnergyLevel());
        $this->assertTrue($octopus->isFlash());
        $octopus->step();
        $this->assertEquals(1, $octopus->getEnergyLevel());
        $this->assertFalse($octopus->isFlash());
    }
}