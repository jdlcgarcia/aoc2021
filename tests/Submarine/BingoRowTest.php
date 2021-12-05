<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\BingoRow;
use PHPUnit\Framework\TestCase;

class BingoRowTest extends TestCase
{
    public function testCreateRowAndMark()
    {
        $cellArray = [14, 21, 17, 24, 4];
        $row = new BingoRow($cellArray);
        $this->assertEquals(14, $row->getCell(0)->getValue());
        $this->assertFalse($row->getCell(0)->isMarked());
        $this->assertEquals(21, $row->getCell(1)->getValue());
        $this->assertFalse($row->getCell(1)->isMarked());
        $this->assertEquals(17, $row->getCell(2)->getValue());
        $this->assertFalse($row->getCell(2)->isMarked());
        $this->assertEquals(24, $row->getCell(3)->getValue());
        $this->assertFalse($row->getCell(3)->isMarked());
        $this->assertEquals(4, $row->getCell(4)->getValue());
        $this->assertFalse($row->getCell(4)->isMarked());

        $row->getCell(2)->mark();
        $this->assertEquals(17, $row->getCell(2)->getValue());
        $this->assertTrue($row->getCell(2)->isMarked());

        $this->assertEquals(63, $row->getScore());
    }

    public function testMarkAll()
    {
        $cellArray = [14, 21, 17, 24, 4];
        $row = new BingoRow($cellArray);
        $row->getCell(0)->mark();
        $row->getCell(1)->mark();
        $row->getCell(2)->mark();
        $row->getCell(3)->mark();
        $row->getCell(4)->mark();

        $this->assertTrue($row->getCell(0)->isMarked());
        $this->assertTrue($row->getCell(1)->isMarked());
        $this->assertTrue($row->getCell(2)->isMarked());
        $this->assertTrue($row->getCell(3)->isMarked());
        $this->assertTrue($row->getCell(4)->isMarked());

        $this->assertEquals(0, $row->getScore());
    }
}