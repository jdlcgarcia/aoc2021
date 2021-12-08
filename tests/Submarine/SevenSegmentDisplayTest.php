<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\SevenSegmentDisplay;
use Jdlcgarcia\Aoc2021\Submarine\SevenSegmentNote;
use PHPUnit\Framework\TestCase;

class SevenSegmentDisplayTest extends TestCase
{
    public function testInitializeDisplay()
    {
        $input = 'acedgfb cdfbe gcdfa fbcad dab cefabd cdfgeb eafb cagedb ab | cdfeb fcadb cdfeb cdbaf';
        $note = new SevenSegmentNote($input);
        $display = new SevenSegmentDisplay([$note]);

        $display->processRightValues();
        $this->assertEquals(0, $display->getUniqueSegmentCombinationCounter());
    }

    public function testLargerExample()
    {
        $notes = [
            new SevenSegmentNote('be cfbegad cbdgef fgaecd cgeb fdcge agebfd fecdb fabcd edb | fdgacbe cefdb cefbgd gcbe'),
            new SevenSegmentNote('edbfga begcd cbg gc gcadebf fbgde acbgfd abcde gfcbed gfec | fcgedb cgb dgebacf gc'),
            new SevenSegmentNote('fgaebd cg bdaec gdafb agbcfd gdcbef bgcad gfac gcb cdgabef | cg cg fdcagb cbg'),
            new SevenSegmentNote('fbegcd cbd adcefb dageb afcb bc aefdc ecdab fgdeca fcdbega | efabcd cedba gadfec cb'),
            new SevenSegmentNote('aecbfdg fbg gf bafeg dbefa fcge gcbea fcaegb dgceab fcbdga | gecf egdcabf bgf bfgea'),
            new SevenSegmentNote('fgeab ca afcebg bdacfeg cfaedg gcfdb baec bfadeg bafgc acf | gebdcfa ecba ca fadegcb'),
            new SevenSegmentNote('dbcfg fgd bdegcaf fgec aegbdf ecdfab fbedc dacgb gdcebf gf | cefg dcbef fcge gbcadfe'),
            new SevenSegmentNote('bdfegc cbegaf gecbf dfcage bdacg ed bedf ced adcbefg gebcd | ed bcgafe cdgba cbgef'),
            new SevenSegmentNote('egadfb cdbfeg cegd fecab cgb gbdefca cg fgcdab egfdb bfceg | gbdfcae bgc cg cgb'),
            new SevenSegmentNote('gcafb gcf dcaebfg ecagb gf abcdeg gaef cafbge fdbac fegbdc | fgae cfgab fg bagce'),
        ];

        $display = new SevenSegmentDisplay($notes);
        $display->processRightValues();
        $this->assertEquals(26, $display->getUniqueSegmentCombinationCounter());
    }
}