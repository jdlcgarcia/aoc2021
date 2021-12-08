<?php

namespace Jdlcgarcia\Aoc2021\Fish;

class Lanternfish
{
    public const NEW_LANTERNFISH_INTERNAL_TIMER = 8;
    public const CURRENT_LANTERNFISH_INTERNAL_TIMER = 6;
    private int $internalTimer;

    /**
     * @param int $internalTimer
     */
    public function __construct(int $internalTimer)
    {
        $this->internalTimer = $internalTimer;
    }

    public function progress(): ?Lanternfish
    {
        if ($this->internalTimer == 0) {
            $this->internalTimer = self::CURRENT_LANTERNFISH_INTERNAL_TIMER;
            return new Lanternfish(self::NEW_LANTERNFISH_INTERNAL_TIMER);
        }

        $this->internalTimer--;

        return null;
    }

    /**
     * @return int
     */
    public function getInternalTimer(): int
    {
        return $this->internalTimer;
    }

}