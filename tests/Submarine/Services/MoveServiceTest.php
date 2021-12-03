<?php

namespace Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\Position;
use Jdlcgarcia\Aoc2021\Submarine\Services\MoveService;
use PHPUnit\Framework\TestCase;

class MoveServiceTest extends TestCase
{
    public function setUp(): void
    {
        $this->testCase = [
            'forward 5',
            'down 5',
            'forward 8',
            'up 3',
            'down 8',
            'forward 2',
        ];

        $this->expectedResult = 150;
    }
    public function testMoveService()
    {
        $service = new MoveService(new Position());
        foreach($this->testCase as $movementLine) {
            $service->processMove($movementLine);
        }
        $this->assertEquals($this->expectedResult, $service->getScalarPosition());
    }

    public function testMoveServiceWithEmptyLines()
    {
        $service = new MoveService(new Position());
        $this->testCase[] = '';
        foreach($this->testCase as $movementLine) {
            $service->processMove($movementLine);
        }
        $this->assertEquals($this->expectedResult, $service->getScalarPosition());
    }
}