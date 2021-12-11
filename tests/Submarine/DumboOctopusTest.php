<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\DumboOctopus;
use PHPUnit\Framework\TestCase;

class DumboOctopusTest extends TestCase
{
    public function testCreateOctopusAndMakeItShine()
    {
        $octopus = new DumboOctopus(5);
        $octopus->increaseEnergy();
        $octopus->processFlashing();
        $this->assertEquals(6, $octopus->getEnergyLevel());
        $this->assertFalse($octopus->isFlash());
        $octopus->increaseEnergy();
        $octopus->processFlashing();
        $octopus->increaseEnergy();
        $octopus->processFlashing();
        $octopus->increaseEnergy();
        $octopus->processFlashing();
        $octopus->increaseEnergy();
        $octopus->processFlashing();
        $this->assertEquals(0, $octopus->getEnergyLevel());
        $this->assertTrue($octopus->isFlash());
        $octopus->increaseEnergy();
        $octopus->processFlashing();
        $this->assertEquals(1, $octopus->getEnergyLevel());
        $this->assertFalse($octopus->isFlash());
    }
}