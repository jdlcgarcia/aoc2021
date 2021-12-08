<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class SevenSegmentDisplay
{
    private array $numberOfSegments = [
        0 => 0,
        1 => 0,
        2 => 0,
        3 => 0,
        4 => 0,
        5 => 0,
        6 => 0,
        7 => 0
    ];
    /** @var SevenSegmentNote[] */
    private array $notes;
    /** @var int */
    private int $simpleDigitCounter = 0;

    /** @var SevenSegmentNote[] $notes */
    public function __construct(array $notes)
    {
        $this->notes = $notes;
    }

    public function processRightValues(): void
    {
        foreach ($this->notes as $note) {
            foreach ($note->getNumberOfSegmentsUsedByRightSide() as $value) {
                $this->numberOfSegments[$value]++;
            }
        }
    }

    public function getUniqueSegmentCombinationCounter(): int
    {
        return $this->numberOfSegments[2] +
            $this->numberOfSegments[4] +
            $this->numberOfSegments[3] +
            $this->numberOfSegments[7];
    }
}