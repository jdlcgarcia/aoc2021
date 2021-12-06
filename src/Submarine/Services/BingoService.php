<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\BingoBoard;

class BingoService
{
    /** @var BingoBoard[] $boards */
    private array $boards;
    private int $lastScore = 0;

    public function __construct(array $boards)
    {
        $this->boards = $boards;
    }

    public function draw(int $number): ?int
    {
        foreach($this->boards as $board) {
            if ($board->markNumber($number)) {
                return $board->getScore() * $number;
            }
        }

        return null;
    }

    public function drawLastWinner(int $number): void
    {
        foreach($this->boards as $board) {
            if (!$board->isWinner()) {
                if ($board->markNumber($number)) {
                    $this->lastScore = $board->getScore() * $number;
                }
            }
        }
    }

    public function getLastScore(): int
    {
        return $this->lastScore;
    }
}