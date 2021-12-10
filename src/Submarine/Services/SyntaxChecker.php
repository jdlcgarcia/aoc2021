<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Services;

class SyntaxChecker
{
    const SCORES = [
        ')' => 3,
        ']' => 57,
        '}' => 1197,
        '>' => 25137,
    ];
    /** @var string[] */
    private array $lines;
    /** @var string[] */
    private array $stack = [];

    private int $score;

    /**
     * @param string[] $lines
     */
    public function __construct(array $lines)
    {
        $this->lines = $lines;
        $this->score = 0;
    }

    public function process(): int
    {
        foreach ($this->lines as $line) {
            $this->score += $this->processLine($line);
        }
        return $this->score;
    }

    private function processLine(string $line)
    {
        foreach (str_split($line) as $next) {
            $top = end($this->stack);
            if ($this->isOpening($next)) {
                $this->stack[] = $next;
            } elseif ($this->isOpening($top) && $this->areComplementary($top, $next)) {
                array_pop($this->stack);
            } else {
                return $this->score($next);
            }
        }

        return 0;
    }

    private function isOpening(string $character): bool
    {
        return in_array($character, ['(', '[', '{', '<']);
    }

    private function isClosing(string $character): bool
    {
        return in_array($character, [')', ']', '}', '>']);
    }

    private function areComplementary(string $open, string $close): bool
    {
        return ($open === '(' && $close === ')') ||
            ($open === '[' && $close === ']') ||
            ($open === '{' && $close === '}') ||
            ($open === '<' && $close === '>');
    }

    private function score(string $next): int
    {
        return self::SCORES[$next];
    }
}