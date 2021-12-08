<?php

namespace Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\CrabSubmarine;
use Jdlcgarcia\Aoc2021\Submarine\Services\CrabSubmarineOptimizer;
use PHPUnit\Framework\TestCase;

class CrabSubmarineOptimizerTest extends TestCase
{
    public function testOptimizerWithExample()
    {
        $crabSubmarines = [];
        foreach(explode(',', "16,1,2,0,4,2,7,1,2,14") as $position) {
            $crabSubmarines[] = new CrabSubmarine($position);
        }
        $service = new CrabSubmarineOptimizer($crabSubmarines);
        $this->assertEquals(37, $service->getBestPosition());
    }
}