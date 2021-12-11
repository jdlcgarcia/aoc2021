<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Exceptions\PointDoesNotExistException;

class DumboOctopiGrid
{
    /** @var DumboOctopiGridMember[][] */
    private array $grid;
    private int $flashCounter = 0;
    private bool $debug;

    public function __construct(array $rows)
    {
        foreach ($rows as $nthRow => $row) {
            $newRow = [];
            foreach (str_split($row) as $nthColumn => $value) {
                $newRow[] = new DumboOctopiGridMember(new Point($nthColumn, $nthRow), new DumboOctopus($value));
            }
            $this->grid[] = $newRow;
        }
    }

    /**
     * @throws PointDoesNotExistException
     */
    public function getOctopus(int $x, int $y): DumboOctopiGridMember
    {
        if (!isset($this->grid[$y]) || !isset($this->grid[$y][$x])) {
            throw new PointDoesNotExistException(new Point($x, $y));
        }
        return $this->grid[$y][$x];
    }

    public function getFlashCounter(): int
    {
        return $this->flashCounter;
    }

    public function step(bool $debug = false)
    {
        $this->debug = $debug;
        foreach ($this->grid as $row) {
            foreach ($row as $cell) {
                if ($cell->getOctopus()->step()) {
                    $this->flashCounter++;
                }
                if ($this->debug && $cell->getPoint()->getX() === 0 && $cell->getPoint()->getY() === 6) {
                    echo "increasing point " . $cell->getPoint()->getX() . "," . $cell->getPoint()->getY() . " to get energy " . $cell->getOctopus()->getEnergyLevel() . PHP_EOL;
                }
            }
        }

        $this->refreshSideEffects();
    }

    private function refreshSideEffects()
    {
        foreach ($this->grid as $row) {
            foreach ($row as $cell) {
                if ($this->debug ) {
                    echo "checking side effects of point " . $cell->toString() . PHP_EOL;
                }
                if ($cell->getOctopus()->isFlash()) {
                    $this->checkNeighbour($cell->getPoint()->getX() - 1, $cell->getPoint()->getY() - 1);
                    $this->checkNeighbour($cell->getPoint()->getX() - 1, $cell->getPoint()->getY());
                    $this->checkNeighbour($cell->getPoint()->getX() - 1, $cell->getPoint()->getY() + 1);

                    $this->checkNeighbour($cell->getPoint()->getX(), $cell->getPoint()->getY() - 1);

                    $this->checkNeighbour($cell->getPoint()->getX(), $cell->getPoint()->getY() + 1);

                    $this->checkNeighbour($cell->getPoint()->getX() + 1, $cell->getPoint()->getY() - 1);
                    $this->checkNeighbour($cell->getPoint()->getX() + 1, $cell->getPoint()->getY());
                    $this->checkNeighbour($cell->getPoint()->getX() + 1, $cell->getPoint()->getY() + 1);
                }
            }
        }
    }

    private function checkNeighbour(int $x, int $y): void
    {
        if ($this->debug && $x === 0 && $y === 6) {
            echo "checking neighbour point " . $x . "," . $y . PHP_EOL;
        }
        try {
            $neighbour = $this->getOctopus($x, $y);
            if (!$neighbour->getOctopus()->isFlash()) {
                $neighbour->getOctopus()->increaseEnergy();
                if ($x === 0 && $y === 6) {
                    echo "increasing neighbour point " . $x . "," . $y . " to get energy " . $neighbour->getOctopus()->getEnergyLevel() . PHP_EOL;
                }
                if ($neighbour->getOctopus()->processFlashing()) {
                    $this->flashCounter++;
                }
            }
        } catch (PointDoesNotExistException $e) {
        }
    }
}