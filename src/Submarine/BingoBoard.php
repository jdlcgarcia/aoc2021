<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

use JetBrains\PhpStorm\Pure;

class BingoBoard
{
    /** @var BingoRow[] */
    private array $board;
    private array $rowCount = [0, 0, 0, 0, 0];
    private array $columnCount = [0, 0, 0, 0, 0];
    private int $score = 0;
    private bool $winner = false;

    #[Pure] public function __construct(array $board)
    {
        foreach ($board as $row) {
            $bingoBoard = new BingoRow($row);
            $this->board[] = $bingoBoard;
            $this->score += $bingoBoard->getScore();
        }
    }

    public function getXY(int $row, int $column): BingoCell
    {
        return $this->board[$row]->getCell($column);
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function markNumber(int $ball): bool
    {
        foreach ($this->board as $rowIndex => $bingoRow) {
            $columnIndex = $bingoRow->mark($ball);
            if (!is_null($columnIndex)) {
                $this->score -= $ball;
                $this->rowCount[$rowIndex]++;
                $this->columnCount[$columnIndex]++;

                if ($this->checkWinner($rowIndex, $columnIndex)) {
                    $this->winner = true;

                    return true;
                }

                return false;
            }
        }

        return false;
    }

    private function checkWinner(int $rowIndex, int $columnIndex): bool
    {
        return ($this->rowCount[$rowIndex] === 5 || $this->columnCount[$columnIndex] === 5);
    }

    public function isWinner(): bool
    {
        return $this->winner;
    }
}