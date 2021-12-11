<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Exceptions\PointDoesNotExistException;

class DumboOctopiGrid
{
    /** @var DumboOctopiGridMember[][] */
    private array $grid;
    private int $flashCounter = 0;

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

    public function step()
    {
        foreach($this->grid as $row) {
            foreach ($row as $cell) {
                if ($cell->getOctopus()->getEnergyLevel() === 0) {
                    $cell->getOctopus()->setFlash(false);
                }
                $cell->getOctopus()->increaseEnergy();
            }
        }
        foreach($this->grid as $row) {
            foreach ($row as $cell) {
                if ($cell->getOctopus()->getEnergyLevel() > 9 && !$cell->getOctopus()->isFlash()) {
                    $cell->getOctopus()->setFlash(true);
                    $this->checkSideEffects($cell);
                }
            }
        }
        foreach($this->grid as $row) {
            foreach ($row as $cell) {
                if ($cell->getOctopus()->isFlash()) {
                    $this->flashCounter++;
                    $cell->getOctopus()->setEnergyLevel(0);
                }
            }
        }
    }

    private function checkSideEffects(DumboOctopiGridMember $cell)
    {
        $this->energizeNeighbourIfExists($cell->getPoint()->getX() - 1, $cell->getPoint()->getY() - 1);
        $this->energizeNeighbourIfExists($cell->getPoint()->getX() - 1, $cell->getPoint()->getY());
        $this->energizeNeighbourIfExists($cell->getPoint()->getX() - 1, $cell->getPoint()->getY() + 1);

        $this->energizeNeighbourIfExists($cell->getPoint()->getX(), $cell->getPoint()->getY() - 1);

        $this->energizeNeighbourIfExists($cell->getPoint()->getX(), $cell->getPoint()->getY() + 1);

        $this->energizeNeighbourIfExists($cell->getPoint()->getX() + 1, $cell->getPoint()->getY() - 1);
        $this->energizeNeighbourIfExists($cell->getPoint()->getX() + 1, $cell->getPoint()->getY());
        $this->energizeNeighbourIfExists($cell->getPoint()->getX() + 1, $cell->getPoint()->getY() + 1);
    }

    private function energizeNeighbourIfExists(int $x, int $y)
    {
        try {
            $neighbour = $this->getOctopus($x, $y);
            $neighbour->getOctopus()->increaseEnergy();
            if ($neighbour->getOctopus()->getEnergyLevel() > 9 && !$neighbour->getOctopus()->isFlash()) {
                $neighbour->getOctopus()->setFlash(true);
                $this->checkSideEffects($neighbour);
            }
        } catch (PointDoesNotExistException $e) {
        }
    }
}