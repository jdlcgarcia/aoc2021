<?php

namespace Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\Services\SevenSegmentGuesser;
use PHPUnit\Framework\TestCase;

class SevenSegmentGuesserTest extends TestCase
{
    public function testOneRow()
    {
        $guesser = new SevenSegmentGuesser('cedgfb cdfbe gcdfa fbcad dab cefabd cdfgeb eafb cagedb ab | cdfeb fcadb cdfeb cdbaf');
        $guessed = $guesser->guess();
        $this->assertEquals(5353, $guessed);
    }

    public function testMultipleRow()
    {
        $this->markTestSkipped("takes too long");
        $input = [
            'be cfbegad cbdgef fgaecd cgeb fdcge agebfd fecdb fabcd edb | fdgacbe cefdb cefbgd gcbe',
            'edbfga begcd cbg gc gcadebf fbgde acbgfd abcde gfcbed gfec | fcgedb cgb dgebacf gc',
            'fgaebd cg bdaec gdafb agbcfd gdcbef bgcad gfac gcb cdgabef | cg cg fdcagb cbg',
            'fbegcd cbd adcefb dageb afcb bc aefdc ecdab fgdeca fcdbega | efabcd cedba gadfec cb',
            'aecbfdg fbg gf bafeg dbefa fcge gcbea fcaegb dgceab fcbdga | gecf egdcabf bgf bfgea',
            'fgeab ca afcebg bdacfeg cfaedg gcfdb baec bfadeg bafgc acf | gebdcfa ecba ca fadegcb',
            'dbcfg fgd bdegcaf fgec aegbdf ecdfab fbedc dacgb gdcebf gf | cefg dcbef fcge gbcadfe',
            'bdfegc cbegaf gecbf dfcage bdacg ed bedf ced adcbefg gebcd | ed bcgafe cdgba cbgef',
            'egadfb cdbfeg cegd fecab cgb gbdefca cg fgcdab egfdb bfceg | gbdfcae bgc cg cgb',
            'gcafb gcf dcaebfg ecagb gf abcdeg gaef cafbge fdbac fegbdc | fgae cfgab fg bagce',
        ];
        $sum = 0;
        foreach($input as $line) {
            $guesser = new SevenSegmentGuesser($line);
            $sum += $guesser->guess();
        }

        $this->assertEquals(61229, $sum);
    }
}