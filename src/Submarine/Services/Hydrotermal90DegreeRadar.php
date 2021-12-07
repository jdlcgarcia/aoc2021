<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\HydrotermalCloud;
use Jdlcgarcia\Aoc2021\Submarine\Point;

class Hydrotermal90DegreeRadar extends HydrotermalRadar
{
    /**
     * @param HydrotermalCloud[] $clouds
     */
    public function __construct(array $clouds)
    {
        $this->maxPoint = new Point();
        foreach($clouds as $cloud) {
            if ($cloud->isHorizontal() || $cloud->isVertical()) {
                $this->clouds[] = $cloud;
                if ($cloud->getOrigin()->getX() > $this->maxPoint->getX()) {
                    $this->maxPoint->setX($cloud->getOrigin()->getX());
                }
                if ($cloud->getEnd()->getX() > $this->maxPoint->getX()) {
                    $this->maxPoint->setX($cloud->getEnd()->getX());
                }
                if ($cloud->getOrigin()->getY() > $this->maxPoint->getY()) {
                    $this->maxPoint->setY($cloud->getOrigin()->getY());
                }
                if ($cloud->getEnd()->getY() > $this->maxPoint->getY()) {
                    $this->maxPoint->setY($cloud->getEnd()->getY());
                }
            }
        }

        parent::__construct($clouds);
    }
}