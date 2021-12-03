<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Exceptions\CommandNotSupportedException;
use Jdlcgarcia\Aoc2021\Submarine\PositionWithAim;
use PHPUnit\Framework\TestCase;

class PositionWithAimTest extends TestCase
{
    public function testCreateEmptyPosition()
    {
        $position = new PositionWithAim();

        $this->assertEquals(0, $position->getHorizontal());
        $this->assertEquals(0, $position->getDepth());
        $this->assertEquals(0, $position->getAim());
    }

    public function testCreateConcretePosition()
    {
        $position = new PositionWithAim(5, -2, 7);

        $this->assertEquals(5, $position->getHorizontal());
        $this->assertEquals(-2, $position->getDepth());
        $this->assertEquals(7, $position->getAim());
    }

    public function testMoveAfterEmptyPosition()
    {
        $position = new PositionWithAim();
        $position->move(PositionWithAim::UP, 5);
        $position->move(PositionWithAim::DOWN, 1);
        $position->move(PositionWithAim::FORWARD, 3);


        $this->assertEquals(3, $position->getHorizontal());
        $this->assertEquals(-12, $position->getDepth());
        $this->assertEquals(-4, $position->getAim());
    }

    public function testMoveAfterConcretePosition()
    {
        $position = new PositionWithAim(5, -2);
        $position->move(PositionWithAim::UP, 5);
        $position->move(PositionWithAim::DOWN, 1);
        $position->move(PositionWithAim::FORWARD, 3);


        $this->assertEquals(8, $position->getHorizontal());
        $this->assertEquals(-14, $position->getDepth());
        $this->assertEquals(-4, $position->getAim());
    }

    public function testUnsupportedMove()
    {
        $position = new PositionWithAim(5, -2);
        $position->move(PositionWithAim::FORWARD, 3);
        $position->move(PositionWithAim::UP, 5);
        $position->move(PositionWithAim::DOWN, 1);
        $this->expectException(CommandNotSupportedException::class);
        $position->move('backwards', 1);
    }
}