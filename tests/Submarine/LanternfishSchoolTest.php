<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\LanternfishSchool;
use PHPUnit\Framework\TestCase;

class LanternfishSchoolTest extends TestCase
{
    public function testCreateSchoolOfOneAndMakeItCreate()
    {
        $school = new LanternfishSchool([3]);
        $school->fastForward(4);
        $this->assertEquals(2, $school->getSchoolSize());
    }

    public function testCreateSchoolOfManyAndMakeItCreate()
    {
        $school = new LanternfishSchool([3, 4, 3, 1, 2]);
        $school->fastForward(18);
        $this->assertEquals(26, $school->getSchoolSize());
        $school->fastForward(62);
        $this->assertEquals(5934, $school->getSchoolSize());
        $school->fastForward(176);
        $this->assertEquals(26984457539, $school->getSchoolSize());
    }
}