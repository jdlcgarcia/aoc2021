<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\SevenSegmentNote;
use PHPUnit\Framework\TestCase;

class SevenSegmentNoteTest extends TestCase
{
    public function testCreateNoteAndGetValue()
    {
        $input = 'acedgfb cdfbe gcdfa fbcad dab cefabd cdfgeb eafb cagedb ab | cdfeb fcadb cdfeb cdbaf';
        $note = new SevenSegmentNote($input);
        $this->assertEquals([5, 5, 5, 5], $note->getNumberOfSegmentsUsedByRightSide());
    }
}