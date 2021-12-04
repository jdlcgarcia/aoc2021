<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\DiagnosticReport;
use PHPUnit\Framework\TestCase;

class DiagnosticReportTest extends TestCase
{
    public function setUp(): void
    {
        $this->testValue = [
            '00100',
            '11110',
            '10110',
            '10111',
            '10101',
            '01111',
            '00111',
            '11100',
            '10000',
            '11001',
            '00010',
            '01010',
        ];

        $this->powerConsumption = 198;
    }

    public function testGetPowerConsumption()
    {
        $report = new DiagnosticReport($this->testValue, 5);
        $report->process();

        $this->assertEquals($this->powerConsumption, $report->powerConsumption());
    }
}