<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class BingoBoard
{
    private array $board;
    private array $rowCount = [0, 0, 0, 0, 0];
    private array $columnCount = [0, 0, 0, 0, 0];
    private int $score = 0;

    public function __construct(array $board)
    {
        $this->board = $board;
    }

    public function getXY(int $row, int $column): int
    {
        return $this->board[$row][$column];
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function markNumber(int $ball): bool
    {
        foreach ($this->board as $rowIndex => $row) {
            foreach ($row as $columnIndex => $cell) {
                if ($cell === $ball) {
                    $this->rowCount[$rowIndex]++;
                    $this->columnCount[$columnIndex]++;

                    if (($this->rowCount[$rowIndex] !== 5) && ($this->columnCount[$columnIndex] !== 5)) {
                        return false;
                    }

                    if ($this->rowCount[$rowIndex] === 5) {
                        $this->calculateRowScore($rowIndex, $ball);
                    } else {
                        $this->calculateColumnScore($columnIndex, $ball);
                    }
                    return true;
                }
            }
        }

        return false;
    }

    private function calculateRowScore(int $rowIndex, mixed $ball): void
    {
        foreach ($this->board[$rowIndex] as $cell) {
            $this->score += $cell;
        }
        $this->score *= $ball;
    }

    private function calculateColumnScore(int $columnIndex, mixed $ball): void
    {
        foreach ($this->board as $row) {
            foreach ($row as $index => $cell) {
                if ($index === $columnIndex) {
                    $this->score += $cell;
                }
            }
        }
        $this->score *= $ball;
    }
}