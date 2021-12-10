<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Services;

class SyntaxChecker
{
    const SYNTAX_ERROR_SCORES = [
        ')' => 3,
        ']' => 57,
        '}' => 1197,
        '>' => 25137,
    ];
    const AUTOCOMPLETE_SCORES = [
        '(' => 1,
        '[' => 2,
        '{' => 3,
        '<' => 4,
    ];
    /** @var string[] */
    private array $lines;
    /** @var string[] */
    private array $stack = [];

    private int $syntaxErrorScore;
    private array $autocompleteScore = [];

    /**
     * @param string[] $lines
     */
    public function __construct(array $lines)
    {
        $this->lines = $lines;
        $this->syntaxErrorScore = 0;
        $this->autocompleteScore = [];
        $this->process();
    }

    private function process(): void
    {
        foreach ($this->lines as $line) {
            $this->processLine($line);
        }
    }

    private function processLine(string $line)
    {
        $corrupted = $this->findCorruptedLine($line);

        if (!$corrupted) {
            $autocompleteScore = 0;
            while(!empty($this->stack)) {
                $top = end($this->stack);
                array_pop($this->stack);
                $autocompleteScore = ($autocompleteScore * 5) + $this->autocompleteScore($top);
            }
            $this->autocompleteScore[] = $autocompleteScore;
        }
    }

    private function isOpening(string $character): bool
    {
        return in_array($character, ['(', '[', '{', '<']);
    }

    public function getAutocompleteScore(): int
    {
        sort($this->autocompleteScore);
        while(sizeof($this->autocompleteScore) != 1) {
            array_pop($this->autocompleteScore);
            array_shift($this->autocompleteScore);
        }
        return $this->autocompleteScore[0];
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

    private function syntaxErrorScore(string $next): int
    {
        return self::SYNTAX_ERROR_SCORES[$next];
    }

    public function getSyntaxErrorScore(): int
    {
        return $this->syntaxErrorScore;
    }

    private function autocompleteScore(string $next): int
    {
        return self::AUTOCOMPLETE_SCORES[$next];
    }

    /**
     * @param string $line
     * @return bool
     */
    private function findCorruptedLine(string $line): bool
    {
        $this->stack = [];
        foreach (str_split($line) as $next) {
            $top = end($this->stack);
            if ($this->isOpening($next)) {
                $this->stack[] = $next;
            } elseif ($this->isOpening($top) && $this->areComplementary($top, $next)) {
                array_pop($this->stack);
            } else {
                $this->syntaxErrorScore += $this->syntaxErrorScore($next);

                return true;
            }
        }

        return false;
    }
}