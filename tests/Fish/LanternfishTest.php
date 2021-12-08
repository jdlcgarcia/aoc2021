<?php

namespace Fish;

use Jdlcgarcia\Aoc2021\Fish\Lanternfish;
use PHPUnit\Framework\TestCase;

class LanternfishTest extends TestCase
{
    public function testCreateNewLanternfishAndMakeItCreateANewOne()
    {
        $lanternfish = new Lanternfish(3);
        $this->assertNull($lanternfish->progress());
        $this->assertEquals(2, $lanternfish->getInternalTimer());
        $this->assertNull($lanternfish->progress());
        $this->assertEquals(1, $lanternfish->getInternalTimer());
        $this->assertNull($lanternfish->progress());
        $this->assertEquals(0, $lanternfish->getInternalTimer());
        $babyLanternfish = $lanternfish->progress();
        $this->assertInstanceOf(Lanternfish::class, $babyLanternfish);
        $this->assertEquals(8, $babyLanternfish->getInternalTimer());
        $this->assertEquals(6, $lanternfish->getInternalTimer());
    }
}