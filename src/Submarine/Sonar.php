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
}