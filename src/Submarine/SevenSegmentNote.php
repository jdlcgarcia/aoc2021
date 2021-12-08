<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

use JetBrains\PhpStorm\Pure;

class SevenSegmentNote
{
    private string $leftSide;
    private string $rightSide;

    public function __construct(string $line)
    {
        list($this->leftSide, $this->rightSide) = explode(' | ', $line);
    }

    /**
     * @return string
     */
    public function getLeftSide(): string
    {
        return $this->leftSide;
    }

    /**
     * @return string
     */
    public function getRightSide(): string
    {
        return $this->rightSide;
    }

    #[Pure] public function getNumberOfSegmentsUsedByRightSide(): array
    {
        $segments = [];
        foreach(explode(' ', $this->getRightSide()) as $word) {
            $segments[] = strlen($word);
        }

        return $segments;
    }

    public function getValueOfRightSide(): array
    {
        $values = [];
        foreach(explode(' ', $this->getRightSide()) as $word) {
            $sum = 0;
            foreach(str_split($word) as $char) {
                $sum += ord($char);
                echo $char;
            }
            $values[] = $sum;
            echo " = " . $sum . PHP_EOL;
        }

        return $values;
    }
}