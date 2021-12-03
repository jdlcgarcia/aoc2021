<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Exceptions\CommandNotSupportedException;
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
        $position->move(Position::FORWARD, 3);
        $position->move(Position::UP, 5);
        $position->move(Position::DOWN, 1);

        $this->assertEquals(3, $position->getHorizontal());
        $this->assertEquals(-4, $position->getDepth());
        $this->assertEquals(-12, $position->getPosition());
    }

    public function testMoveAfterConcretePosition()
    {
        $position = new Position(5, -2);
        $position->move(Position::FORWARD, 3);
        $position->move(Position::UP, 5);
        $position->move(Position::DOWN, 1);

        $this->assertEquals(8, $position->getHorizontal());
        $this->assertEquals(-6, $position->getDepth());
        $this->assertEquals(-48, $position->getPosition());
    }

    public function testUnsupportedMove()
    {
        $position = new Position(5, -2);
        $position->move(Position::FORWARD, 3);
        $position->move(Position::UP, 5);
        $position->move(Position::DOWN, 1);
        $this->expectException(CommandNotSupportedException::class);
        $position->move('backwards', 1);
    }
}