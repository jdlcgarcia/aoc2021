<?php

namespace Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\Services\SyntaxChecker;
use PHPUnit\Framework\TestCase;

class SyntaxCheckerTest extends TestCase
{
    public function testCheckCorrectLines()
    {
        $input = [
            '()',
            '[]',
            '([])',
            '{()()()}',
            '<([{}])>',
            '[<>({}){}[([])<>]]',
            '(((((((((())))))))))'
        ];
        $checker = new SyntaxChecker($input);
        $this->assertEquals(0, $checker->getSyntaxErrorScore());
    }

    public function testCheckCorruptLines()
    {
        $input = [];
        $score = 0;
        $input[] = '(]';
        $score += 57;
        $input[] = '{()()()>';
        $score += 25137;
        $input[] = '(((()))}';
        $score += 1197;
        $input[] = '<([]){()}[{}])';
        $score += 3;

        $checker = new SyntaxChecker($input);
        $this->assertEquals($score, $checker->getSyntaxErrorScore());
    }

    public function testCheckIncompleteAndCorruptLines()
    {
        $input = [
            '[({(<(())[]>[[{[]{<()<>>',
            '[(()[<>])]({[<{<<[]>>(',
            '{([(<{}[<>[]}>{[]{[(<()>',
            '(((({<>}<{<{<>}{[]{[]{}',
            '[[<[([]))<([[{}[[()]]]',
            '[{[{({}]{}}([{[{{{}}([]',
            '{<[[]]>}<{[{[{[]{()[[[]',
            '[<(<(<(<{}))><([]([]()',
            '<{([([[(<>()){}]>(<<{{',
            '<{([{{}}[<[[[<>{}]]]>[]]',
        ];

        $checker = new SyntaxChecker($input);
        $this->assertEquals(26397, $checker->getSyntaxErrorScore());
        $this->assertEquals(288957, $checker->getAutocompleteScore());
    }

    public function testCheckIncompleteLines()
    {
        $input = [
            '<{([{{}}[<[[[<>{}]]]>[]]'
        ];
        $checker = new SyntaxChecker($input);
        $this->assertEquals(294, $checker->getAutocompleteScore());
    }
}