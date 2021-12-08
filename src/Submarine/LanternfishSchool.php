<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class LanternfishSchool
{
    private array $population = [
        0 => 0,
        1 => 0,
        2 => 0,
        3 => 0,
        4 => 0,
        5 => 0,
        6 => 0,
        7 => 0,
        8 => 0
    ];

    /**
     * @param int[] $initialSchool
     */
    public function __construct(array $initialSchool)
    {
        foreach ($initialSchool as $fish) {
            $this->population[$fish]++;
        }
    }

    public function progress()
    {
        $daddies = $this->population[0];
        $this->population[0] = $this->population[1];
        $this->population[1] = $this->population[2];
        $this->population[2] = $this->population[3];
        $this->population[3] = $this->population[4];
        $this->population[4] = $this->population[5];
        $this->population[5] = $this->population[6];
        $this->population[6] = $this->population[7] + $daddies;
        $this->population[7] = $this->population[8];
        $this->population[8] = $daddies;
    }

    public function fastForward(int $n)
    {
        for ($i = 0; $i < $n; $i++) {
            echo "Day " . $i . ": " . PHP_EOL;
            $this->progress();
        }
    }

    public function getSchoolSize(): int
    {
        return $this->population[0]
            + $this->population[1]
            + $this->population[2]
            + $this->population[3]
            + $this->population[4]
            + $this->population[5]
            + $this->population[6]
            + $this->population[7]
            + $this->population[8];
    }
}