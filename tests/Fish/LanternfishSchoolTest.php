<?php

namespace Fish;

use Jdlcgarcia\Aoc2021\Fish\Lanternfish;
use Jdlcgarcia\Aoc2021\Fish\LanternfishSchool;
use PHPUnit\Framework\TestCase;

class LanternfishSchoolTest extends TestCase
{
    public function testCreateSchoolOfOneAndMakeItCreate()
    {
        $school = new LanternfishSchool([new Lanternfish(3)]);
        $school->progress();
        $this->assertEquals($school->getSchool(), [new Lanternfish(2)]);
        $school->progress();
        $this->assertEquals($school->getSchool(), [new Lanternfish(1)]);
        $school->progress();
        $this->assertEquals($school->getSchool(), [new Lanternfish(0)]);
        $school->progress();
        $this->assertEquals($school->getSchool(), [new Lanternfish(6), new Lanternfish(8)]);
    }

    public function testCreateSchoolOfManyAndMakeItCreate()
    {
        $school = new LanternfishSchool([
            new Lanternfish(3),
            new Lanternfish(4),
            new Lanternfish(3),
            new Lanternfish(1),
            new Lanternfish(2),
        ]);
        $school->fastForward(18);
        $this->assertCount(26, $school->getSchool());
        $school->fastForward(62);
        $this->assertCount(5934, $school->getSchool());
    }
}