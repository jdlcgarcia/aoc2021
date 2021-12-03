<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class Sonar
{
    /**
     * @param int[] $depths
     * @return int
     */
    public function countDepthIncreases(array $depths): int
    {
        $lastDepth = reset($depths);
        $increase = 0;
        foreach($depths as $depth) {
            if ($depth > $lastDepth) {
                $increase++;
            }
            $lastDepth = $depth;
        }

        return $increase;
    }

    public function countThreeMeasurementSlidingWindowDepthIncreases(array $depths): int
    {
        $lastDepth = new ComplexMeasurement($depths[0], $depths[1], $depths[2]);
        $increase = 0;
        for($i = 1; $i <= count($depths)-3; $i++) {
            $currentDepth = new ComplexMeasurement($depths[$i], $depths[$i+1], $depths[$i+2]);
            if ($currentDepth->getValue() > $lastDepth->getValue()) {
                $increase++;
            }
            $lastDepth = $currentDepth;
        }

        return $increase;
    }
}