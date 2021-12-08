<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\CrabSubmarine;
use PHPUnit\Framework\TestCase;

class CrabSubmarineTest extends TestCase
{
    public function testCreateAndMoveCrabSubmarine()
    {
        $crabSubmarine = new CrabSubmarine(16);
        $fuel = $crabSubmarine->move(2);

        $this->assertEquals(14, $fuel);
    }
}