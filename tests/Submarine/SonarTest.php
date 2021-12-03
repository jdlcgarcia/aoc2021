<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Sonar;
use PHPUnit\Framework\TestCase;

class SonarTest extends TestCase
{
    public function setUp(): void
    {
        $this->testCase = [
            199,
            200,
            208,
            210,
            200,
            207,
            240,
            269,
            260,
            263
        ];

        $this->expectedResult = 7;
    }

    public function testCountDepthIncreases()
    {
        $sonar = new Sonar();
        $depth = $sonar->countDepthIncreases($this->testCase);

        $this->assertEquals($this->expectedResult, $depth);
    }
}