<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\DumboOctopiGridMember;
use Jdlcgarcia\Aoc2021\Submarine\DumboOctopus;
use Jdlcgarcia\Aoc2021\Submarine\Point;
use PHPUnit\Framework\TestCase;

class DumboOctopiGridMemberTest extends TestCase
{
    public function testCreateOctopus()
    {
        $octopus = new DumboOctopiGridMember(new Point(0, 0), new DumboOctopus(5));
        $this->assertEquals(0, $octopus->getPoint()->getX());
        $this->assertEquals(0, $octopus->getPoint()->getY());
        $this->assertEquals(5, $octopus->getOctopus()->getEnergyLevel());
        $this->assertFalse($octopus->getOctopus()->isFlash());
        $octopus->getOctopus()->increaseEnergy();
        $octopus->getOctopus()->processFlashing();
        $this->assertEquals(0, $octopus->getPoint()->getX());
        $this->assertEquals(0, $octopus->getPoint()->getY());
        $this->assertEquals(6, $octopus->getOctopus()->getEnergyLevel());
        $this->assertFalse($octopus->getOctopus()->isFlash());
    }
}