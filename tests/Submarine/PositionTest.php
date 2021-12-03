<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Position;
use PHPUnit\Framework\TestCase;

class PositionTest extends TestCase
{
    public function testCreateEmptyPosition()
    {
        $position = new Position();

        $this->assertEquals(0, $position->getHorizontal());
        $this->assertEquals(0, $position->getDepth());
        $this->assertEquals(0, $position->getPosition());
    }

    public function testCreateConcretePosition()
    {
        $position = new Position(5, -2);

        $this->assertEquals(5, $position->getHorizontal());
        $this->assertEquals(-2, $position->getDepth());
        $this->assertEquals(-10, $position->getPosition());
    }

    public function testMoveAfterEmptyPosition()
    {
        $position = new Position();
        $position->moveForward(3);
        $position->moveUp(5);

        $this->assertEquals(3, $position->getHorizontal());
        $this->assertEquals(-5, $position->getDepth());
        $this->assertEquals(-15, $position->getPosition());
    }

    public function testMoveAfterConcretePosition()
    {
        $position = new Position(5, -2);
        $position->moveForward(3);
        $position->moveUp(5);

        $this->assertEquals(8, $position->getHorizontal());
        $this->assertEquals(-7, $position->getDepth());
        $this->assertEquals(-56, $position->getPosition());
    }
}