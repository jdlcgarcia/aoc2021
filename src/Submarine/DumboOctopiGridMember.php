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
     * @return DumboOctopus
     */
    public function getOctopus(): DumboOctopus
    {
        return $this->octopus;
    }
}