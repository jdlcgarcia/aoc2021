<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

use JetBrains\PhpStorm\Pure;

class DumboOctopiGridMember
{
    private Point $point;
    private DumboOctopus $octopus;

    /**
     * @param Point $point
     * @param DumboOctopus $octopus
     */
    public function __construct(Point $point, DumboOctopus $octopus)
    {
        $this->point = $point;
        $this->octopus = $octopus;
    }

    /**
     * @return Point
     */
    public function getPoint(): Point
    {
        return $this->point;
    }

    /**
     * @param Point $point
     */
    public function setPoint(Point $point): void
    {
        $this->point = $point;
    }

    /**
     * @return DumboOctopus
     */
    public function getOctopus(): DumboOctopus
    {
        return $this->octopus;
    }

    /**
     * @param DumboOctopus $octopus
     */
    public function setOctopus(DumboOctopus $octopus): void
    {
        $this->octopus = $octopus;
    }

    #[Pure] public function toString(): string
    {
        return $this->getPoint()->toString().'('.$this->getOctopus()->getEnergyLevel().')';
    }
}