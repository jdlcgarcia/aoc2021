<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class HeightPoint
{
    private Point $point;
    private int $height;

    /**
     * @param Point $point
     * @param int $height
     */
    public function __construct(Point $point, int $height)
    {
        $this->point = $point;
        $this->height = $height;
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
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }
}