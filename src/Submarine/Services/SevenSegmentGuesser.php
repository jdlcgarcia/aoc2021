<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Services;

class SevenSegmentGuesser
{
    private const AVAILABLE = 'abcdefg';
    private string $leftSide;
    private string $rightSide;
    private array $permutations = [];
    private array $encodedDigits = [];
    private array $allowed = [
        0 => [
            'pattern' => [true, true, true, false, true, true, true],
            'segments' => 6,
        ],
        1 => [
            'pattern' => [false, false, true, false, false, true, false],
            'segments' => 2,
        ],
        2 => [
            'pattern' => [true, false, true, true, true, false, true],
            'segments' => 5,
        ],
        3 => [
            'pattern' => [true, false, true, true, false, true, true],
            'segments' => 5,
        ],
        4 => [
            'pattern' => [false, true, true, true, false, true, false],
            'segments' => 4,
        ],
        5 => [
            'pattern' => [true, true, false, true, false, true, true],
            'segments' => 5,
        ],
        6 => [
            'pattern' => [true, true, false, true, true, true, true],
            'segments' => 6,
        ],
        7 => [
            'pattern' => [true, false, true, false, false, true, false],
            'segments' => 3,
        ],
        8 => [
            'pattern' => [true, true, true, true, true, true, true],
            'segments' => 7,
        ],
        9 => [
            'pattern' => [true, true, true, true, false, true, true],
            'segments' => 6,
        ],
    ];

    public function __construct(string $input)
    {
        $this->permute(self::AVAILABLE, 0, strlen(self::AVAILABLE));
        list($this->leftSide, $this->rightSide) = explode(' | ', $input);
        foreach (explode(' ', $this->leftSide) as $encodedDigit) {
            $this->encodedDigits[] = $encodedDigit;
        }
        foreach (explode(' ', $this->rightSide) as $encodedDigit) {
            $this->encodedDigits[] = $encodedDigit;
        }
    }

    public function guess(): int
    {
        foreach ($this->encodedDigits as $encodedDigit) {
            foreach ($this->permutations as $permutation) {
                $this->analyseAndDiscardPermutation($permutation, $encodedDigit);
            }
        }

        $decoded = [];
        foreach(explode(' ', $this->rightSide) as $pattern) {
            $decoded[] = $this->decode($pattern);
        }
        return (int)implode('', $decoded);
    }

    private function permute($str, $i, $n)
    {
        if ($i == $n) {
            $this->permutations[$str] = $str;
        } else {
            for ($j = $i; $j < $n; $j++) {
                $this->swap($str, $i, $j);
                $this->permute($str, $i + 1, $n);
                $this->swap($str, $i, $j);
            }
        }
    }

    private function swap(&$str, $i, $j)
    {
        $temp = $str[$i];
        $str[$i] = $str[$j];
        $str[$j] = $temp;
    }

    private function analyseAndDiscardPermutation(string $permutation, string $givenPattern): void
    {
        $savedPermutation = $permutation;
        $binaryCoded = $this->getBinaryCoded($permutation, $givenPattern);

        if (is_null($this->getNumber($givenPattern, $binaryCoded))) {
            unset($this->permutations[$savedPermutation]);
        }
    }

    /**
     * @param string $permutation
     * @return void
     */
    private function drawDigit(string $permutation): void
    {
        echo ' ' . $permutation[0] . $permutation[0] . $permutation[0] . $permutation[0] . ' ' . PHP_EOL;
        echo $permutation[1] . '    ' . $permutation[2] . PHP_EOL;
        echo $permutation[1] . '    ' . $permutation[2] . PHP_EOL;
        echo ' ' . $permutation[3] . $permutation[3] . $permutation[3] . $permutation[3] . ' ' . PHP_EOL;
        echo $permutation[4] . '    ' . $permutation[5] . PHP_EOL;
        echo $permutation[4] . '    ' . $permutation[5] . PHP_EOL;
        echo ' ' . $permutation[6] . $permutation[6] . $permutation[6] . $permutation[6] . ' ' . PHP_EOL;
    }

    private function decode(string $givenPattern): int
    {
        $keyToDecode = reset($this->permutations);
        $binaryCoded = $this->getBinaryCoded($keyToDecode, $givenPattern);

        return $this->getNumber($givenPattern, $binaryCoded);
    }

    /**
     * @param string $permutation
     * @param string $givenPattern
     * @return array
     */
    private function getBinaryCoded(string $permutation, string $givenPattern): array
    {
        $binaryCoded = [];
        for ($i = 0; $i < 7; $i++) {
            $binaryCoded[$i] = in_array($permutation[$i], str_split($givenPattern));
            if (!in_array($permutation[$i], str_split($givenPattern))) {
                $permutation[$i] = ' ';
            }
        }
        return $binaryCoded;
    }

    /**
     * @param string $givenPattern
     * @param array $binaryCoded
     * @return int|null
     */
    private function getNumber(string $givenPattern, array $binaryCoded): ?int
    {
        foreach ($this->allowed as $key => $allowed) {
            if ($allowed['segments'] === strlen($givenPattern) && $binaryCoded === $allowed['pattern']) {
                return $key;
            }
        }

        return null;
    }
}