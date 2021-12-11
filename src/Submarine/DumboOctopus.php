<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class DumboOctopus
{
    private int $energyLevel;
    private bool $flash = false;

    /**
     * @param int $energyLevel
     */
    public function __construct(int $energyLevel)
    {
        $this->energyLevel = $energyLevel;
    }

    /**
     * @return int
     */
    public function getEnergyLevel(): int
    {
        return $this->energyLevel;
    }

    /**
     * @param int $energyLevel
     */
    public function setEnergyLevel(int $energyLevel): void
    {
        $this->energyLevel = $energyLevel;
    }

    /**
     * @return bool
     */
    public function isFlash(): bool
    {
        return $this->flash;
    }

    /**
     * @param bool $flash
     */
    public function setFlash(bool $flash): void
    {
        $this->flash = $flash;
    }

    public function increaseEnergy(): void
    {
        $this->energyLevel++;
    }

    public function processFlashing(): bool
    {
        if ($this->energyLevel > 9 && !$this->flash) {
            $this->flash = true;
            $this->energyLevel = 0;
        } else {
            $this->flash = false;
        }

        return $this->flash;
    }
}