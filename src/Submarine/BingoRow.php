<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

use JetBrains\PhpStorm\Pure;

class BingoRow
{
    /** @var BingoCell[]  */
    private array $cells;

    #[Pure] public function __construct(array $cellValues)
    {
        foreach($cellValues as $cellValue) {
            $this->cells[] = new BingoCell($cellValue);
        }
    }

    #[Pure] public function isWinner(): bool
    {
        $marked = 0;
        foreach($this->cells as $cell) {
            if ($cell->isMarked()) {
                $marked++;
            }
        }

        return $marked === 5;
    }

    #[Pure] public function getScore(): int
    {
        $score = 0;
        foreach($this->cells as $cell) {
            if (!$cell->isMarked()) {
                $score += $cell->getValue();
            }
        }

        return $score;
    }

    public function getCell(int $index): BingoCell
    {
        return $this->cells[$index];
    }

    public function mark(int $ball): ?int
    {
        foreach($this->cells as $cellIndex => $cell) {
            if ($cell->getValue() === $ball) {
                $cell->mark();

                return $cellIndex;
            }
        }

        return null;
    }
}