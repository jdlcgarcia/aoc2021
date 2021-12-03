<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\ComplexMeasurement;
use PHPUnit\Framework\TestCase;

class ComplexMeasurementTest extends TestCase
{
    public function testCreateSuccessfully()
    {
        $complexMeasurement = new ComplexMeasurement(101, 102, 103);
        $complexValue = $complexMeasurement->getValue();

        $this->assertEquals(101 + 102 + 103, $complexValue);
    }
}