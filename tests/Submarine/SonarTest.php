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

        $this->integerListExpectedResult = 7;
        $this->complexMeasurementExpectedResult = 5;
    }

    public function testCountDepthIncreases()
    {
        $sonar = new Sonar();
        $depth = $sonar->countDepthIncreases($this->testCase);

        $this->assertEquals($this->integerListExpectedResult, $depth);
    }

    public function testCountThreeMeasurementSlidingWindowDepthIncreases()
    {
        $sonar = new Sonar();
        $depth = $sonar->countThreeMeasurementSlidingWindowDepthIncreases($this->testCase);

        $this->assertEquals($this->complexMeasurementExpectedResult, $depth);
    }
}