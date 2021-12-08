<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\CrabSubmarine;
use JetBrains\PhpStorm\Pure;

class CrabSubmarineOptimizer
{
    /** @var CrabSubmarine[] */
    private array $crabSubmarines;
    private int $minimumPosition;
    private int $maximumPosition;
    private int $minimumFuelWasted;
    private array $consumptions;

    /**
     * @param CrabSubmarine[] $crabSubmarines
     */
    #[Pure] public function __construct(array $crabSubmarines)
    {
        $this->crabSubmarines = $crabSubmarines;
        $this->maximumPosition = $crabSubmarines[0]->getPosition();
        $this->minimumPosition = $crabSubmarines[0]->getPosition();
        foreach ($crabSubmarines as $crabSubmarine) {
            if ($crabSubmarine->getPosition() > $this->maximumPosition) {
                $this->maximumPosition = $crabSubmarine->getPosition();
            }
            if ($crabSubmarine->getPosition() < $this->minimumPosition) {
                $this->minimumPosition = $crabSubmarine->getPosition();
            }
        }
        $this->minimumFuelWasted = count($crabSubmarines) * $this->summation($this->maximumPosition - $this->minimumPosition);
    }

    public function getBestPosition(): int
    {
        for ($i = $this->minimumPosition; $i <= $this->maximumPosition; $i++) {
            $fuelWasted = 0;
            foreach ($this->crabSubmarines as $submarine) {
                $fuelWasted += $submarine->move($i);
            }
            if ($fuelWasted < $this->minimumFuelWasted) {
                $this->minimumFuelWasted = $fuelWasted;
            }
        }

        return $this->minimumFuelWasted;
    }

    public function getBestPositionWithRealConsumption(): int
    {
        for ($i = $this->minimumPosition; $i <= $this->maximumPosition; $i++) {
            $fuelWasted = 0;
            foreach ($this->crabSubmarines as $submarine) {
                $positionToMove = $submarine->move($i);
                if (!isset($this->consumptions[$positionToMove])) {
                    $this->consumptions[$positionToMove] = $this->summation($positionToMove);
                }
                $fuelWasted += $this->consumptions[$positionToMove];
            }
            if ($fuelWasted < $this->minimumFuelWasted) {
                $this->minimumFuelWasted = $fuelWasted;
            }

        }

        return $this->minimumFuelWasted;
    }

    private function summation(int $param): int
    {
        $sum = 0;
        for ($i = 1; $i <= $param; $i++) {
            $sum += $i;
        }

        return $sum;
    }
}