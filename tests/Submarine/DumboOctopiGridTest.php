<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\DumboOctopiGrid;
use Jdlcgarcia\Aoc2021\Submarine\DumboOctopiGridMember;
use Jdlcgarcia\Aoc2021\Submarine\DumboOctopus;
use Jdlcgarcia\Aoc2021\Submarine\Point;
use PHPUnit\Framework\TestCase;

class DumboOctopiGridTest extends TestCase
{
    public function testOneLowEnergyOctopus()
    {
        $input = ['1'];
        $grid = new DumboOctopiGrid($input);

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 0), new DumboOctopus(1)), $grid->getOctopus(0, 0));
        $grid->step();
        $this->assertEquals(2, $grid->getOctopus(0, 0)->getOctopus()->getEnergyLevel());
        $this->assertFalse($grid->getOctopus(0, 0)->getOctopus()->isFlash());
        $this->assertEquals(0, $grid->getFlashCounter());
    }

    public function testOneHighEnergyOctopus()
    {
        $input = ['9'];
        $grid = new DumboOctopiGrid($input);

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 0), new DumboOctopus(9)), $grid->getOctopus(0, 0));
        $grid->step();
        $this->assertEquals(0, $grid->getOctopus(0, 0)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(0, 0)->getOctopus()->isFlash());
        $this->assertEquals(1, $grid->getFlashCounter());
    }

    public function testSmallGridAndOneStep()
    {
        $input = [
            '999',
            '919',
            '999'
        ];

        $grid = new DumboOctopiGrid($input);
        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 0), new DumboOctopus(9)), $grid->getOctopus(0, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 1), new DumboOctopus(9)), $grid->getOctopus(0, 1));
        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 2), new DumboOctopus(9)), $grid->getOctopus(0, 2));

        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 0), new DumboOctopus(9)), $grid->getOctopus(1, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 1), new DumboOctopus(1)), $grid->getOctopus(1, 1));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 2), new DumboOctopus(9)), $grid->getOctopus(1, 2));

        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 0), new DumboOctopus(9)), $grid->getOctopus(2, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 1), new DumboOctopus(9)), $grid->getOctopus(2, 1));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 2), new DumboOctopus(9)), $grid->getOctopus(2, 2));

        $grid->step();

        $this->assertEquals(0, $grid->getOctopus(0, 0)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(0, 0)->getOctopus()->isFlash());
        $this->assertEquals(0, $grid->getOctopus(0, 1)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(0, 1)->getOctopus()->isFlash());
        $this->assertEquals(0, $grid->getOctopus(0, 2)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(0, 2)->getOctopus()->isFlash());

        $this->assertEquals(0, $grid->getOctopus(1, 0)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(1, 0)->getOctopus()->isFlash());
        $this->assertEquals(0, $grid->getOctopus(1, 1)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(1, 1)->getOctopus()->isFlash());
        $this->assertEquals(0, $grid->getOctopus(1, 2)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(1, 2)->getOctopus()->isFlash());

        $this->assertEquals(0, $grid->getOctopus(2, 0)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(2, 0)->getOctopus()->isFlash());
        $this->assertEquals(0, $grid->getOctopus(2, 1)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(2, 1)->getOctopus()->isFlash());
        $this->assertEquals(0, $grid->getOctopus(2, 2)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(2, 2)->getOctopus()->isFlash());

        $this->assertEquals(9, $grid->getFlashCounter());
    }

    public function testMediumGridAndTwoSteps()
    {
        $input = [
            '11111',
            '19991',
            '19191',
            '19991',
            '11111'
        ];

        $grid = new DumboOctopiGrid($input);

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 0), new DumboOctopus(1)), $grid->getOctopus(0, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 0), new DumboOctopus(1)), $grid->getOctopus(1, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 0), new DumboOctopus(1)), $grid->getOctopus(2, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(3, 0), new DumboOctopus(1)), $grid->getOctopus(3, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 0), new DumboOctopus(1)), $grid->getOctopus(4, 0));

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 1), new DumboOctopus(1)), $grid->getOctopus(0, 1));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 1), new DumboOctopus(9)), $grid->getOctopus(1, 1));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 1), new DumboOctopus(9)), $grid->getOctopus(2, 1));
        $this->assertEquals(new DumboOctopiGridMember(new Point(3, 1), new DumboOctopus(9)), $grid->getOctopus(3, 1));
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 1), new DumboOctopus(1)), $grid->getOctopus(4, 1));

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 2), new DumboOctopus(1)), $grid->getOctopus(0, 2));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 2), new DumboOctopus(9)), $grid->getOctopus(1, 2));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 2), new DumboOctopus(1)), $grid->getOctopus(2, 2));
        $this->assertEquals(new DumboOctopiGridMember(new Point(3, 2), new DumboOctopus(9)), $grid->getOctopus(3, 2));
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 2), new DumboOctopus(1)), $grid->getOctopus(4, 2));

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 3), new DumboOctopus(1)), $grid->getOctopus(0, 3));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 3), new DumboOctopus(9)), $grid->getOctopus(1, 3));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 3), new DumboOctopus(9)), $grid->getOctopus(2, 3));
        $this->assertEquals(new DumboOctopiGridMember(new Point(3, 3), new DumboOctopus(9)), $grid->getOctopus(3, 3));
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 3), new DumboOctopus(1)), $grid->getOctopus(4, 3));

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 4), new DumboOctopus(1)), $grid->getOctopus(0, 4));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 4), new DumboOctopus(1)), $grid->getOctopus(1, 4));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 4), new DumboOctopus(1)), $grid->getOctopus(2, 4));
        $this->assertEquals(new DumboOctopiGridMember(new Point(3, 4), new DumboOctopus(1)), $grid->getOctopus(3, 4));
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 4), new DumboOctopus(1)), $grid->getOctopus(4, 4));

        $grid->step();

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 0), new DumboOctopus(3)), $grid->getOctopus(0, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 0), new DumboOctopus(4)), $grid->getOctopus(1, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 0), new DumboOctopus(5)), $grid->getOctopus(2, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(3, 0), new DumboOctopus(4)), $grid->getOctopus(3, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 0), new DumboOctopus(3)), $grid->getOctopus(4, 0));

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 1), new DumboOctopus(4)), $grid->getOctopus(0, 1));
        $this->assertEquals(0, $grid->getOctopus(1, 1)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(1, 1)->getOctopus()->isFlash());
        $this->assertEquals(0, $grid->getOctopus(2, 1)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(2, 1)->getOctopus()->isFlash());
        $this->assertEquals(0, $grid->getOctopus(3, 1)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(3, 2)->getOctopus()->isFlash());
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 1), new DumboOctopus(4)), $grid->getOctopus(4, 1));

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 2), new DumboOctopus(5)), $grid->getOctopus(0, 2));
        $this->assertEquals(0, $grid->getOctopus(1, 2)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(1, 2)->getOctopus()->isFlash());
        $this->assertEquals(0, $grid->getOctopus(2, 2)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(2, 2)->getOctopus()->isFlash());
        $this->assertEquals(0, $grid->getOctopus(3, 2)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(3, 2)->getOctopus()->isFlash());
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 2), new DumboOctopus(5)), $grid->getOctopus(4, 2));

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 3), new DumboOctopus(4)), $grid->getOctopus(0, 3));
        $this->assertEquals(0, $grid->getOctopus(1, 3)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(1, 3)->getOctopus()->isFlash());
        $this->assertEquals(0, $grid->getOctopus(2, 3)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(2, 3)->getOctopus()->isFlash());
        $this->assertEquals(0, $grid->getOctopus(3, 3)->getOctopus()->getEnergyLevel());
        $this->assertTrue($grid->getOctopus(3, 3)->getOctopus()->isFlash());
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 3), new DumboOctopus(4)), $grid->getOctopus(4, 3));

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 4), new DumboOctopus(3)), $grid->getOctopus(0, 4));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 4), new DumboOctopus(4)), $grid->getOctopus(1, 4));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 4), new DumboOctopus(5)), $grid->getOctopus(2, 4));
        $this->assertEquals(new DumboOctopiGridMember(new Point(3, 4), new DumboOctopus(4)), $grid->getOctopus(3, 4));
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 4), new DumboOctopus(3)), $grid->getOctopus(4, 4));

        $grid->step();

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 0), new DumboOctopus(4)), $grid->getOctopus(0, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 0), new DumboOctopus(5)), $grid->getOctopus(1, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 0), new DumboOctopus(6)), $grid->getOctopus(2, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(3, 0), new DumboOctopus(5)), $grid->getOctopus(3, 0));
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 0), new DumboOctopus(4)), $grid->getOctopus(4, 0));

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 1), new DumboOctopus(5)), $grid->getOctopus(0, 1));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 1), new DumboOctopus(1)), $grid->getOctopus(1, 1));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 1), new DumboOctopus(1)), $grid->getOctopus(2, 1));
        $this->assertEquals(new DumboOctopiGridMember(new Point(3, 1), new DumboOctopus(1)), $grid->getOctopus(3, 1));
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 1), new DumboOctopus(5)), $grid->getOctopus(4, 1));

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 2), new DumboOctopus(6)), $grid->getOctopus(0, 2));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 2), new DumboOctopus(1)), $grid->getOctopus(1, 2));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 2), new DumboOctopus(1)), $grid->getOctopus(2, 2));
        $this->assertEquals(new DumboOctopiGridMember(new Point(3, 2), new DumboOctopus(1)), $grid->getOctopus(3, 2));
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 2), new DumboOctopus(6)), $grid->getOctopus(4, 2));

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 3), new DumboOctopus(5)), $grid->getOctopus(0, 3));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 3), new DumboOctopus(1)), $grid->getOctopus(1, 3));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 3), new DumboOctopus(1)), $grid->getOctopus(2, 3));
        $this->assertEquals(new DumboOctopiGridMember(new Point(3, 3), new DumboOctopus(1)), $grid->getOctopus(3, 3));
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 3), new DumboOctopus(5)), $grid->getOctopus(4, 3));

        $this->assertEquals(new DumboOctopiGridMember(new Point(0, 4), new DumboOctopus(4)), $grid->getOctopus(0, 4));
        $this->assertEquals(new DumboOctopiGridMember(new Point(1, 4), new DumboOctopus(5)), $grid->getOctopus(1, 4));
        $this->assertEquals(new DumboOctopiGridMember(new Point(2, 4), new DumboOctopus(6)), $grid->getOctopus(2, 4));
        $this->assertEquals(new DumboOctopiGridMember(new Point(3, 4), new DumboOctopus(5)), $grid->getOctopus(3, 4));
        $this->assertEquals(new DumboOctopiGridMember(new Point(4, 4), new DumboOctopus(4)), $grid->getOctopus(4, 4));

        $this->assertEquals(9, $grid->getFlashCounter());
    }

    public function testRegularGrid()
    {
        $input0 = [
            '5483143223',
            '2745854711',
            '5264556173',
            '6141336146',
            '6357385478',
            '4167524645',
            '2176841721',
            '6882881134',
            '4846848554',
            '5283751526',
        ];

        $grid0 = new DumboOctopiGrid($input0);
        $grid0->step();
        $this->assertEquals(0, $grid0->getFlashCounter());

        $input1 = [
            '6594254334',
            '3856965822',
            '6375667284',
            '7252447257',
            '7468496589',
            '5278635756',
            '3287952832',
            '7993992245',
            '5957959665',
            '6394862637',
        ];
        $grid1 = new DumboOctopiGrid($input1);
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 10; $j++) {
                $this->assertEquals(
                    $grid1->getOctopus($i, $j)->getOctopus()->getEnergyLevel(),
                    $grid0->getOctopus($i, $j)->getOctopus()->getEnergyLevel());
            }
        }
        $this->assertEquals(0, $grid0->getFlashCounter());
        $grid0->step();

        $input2 = [
            '8807476555',
            '5089087054',
            '8597889608',
            '8485769600',
            '8700908800',
            '6600088989',
            '6800005943',
            '0000007456',
            '9000000876',
            '8700006848',
        ];
        $grid2 = new DumboOctopiGrid($input2);
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 10; $j++) {
                $this->assertEquals(
                    $grid2->getOctopus($i, $j)->getOctopus()->getEnergyLevel(),
                    $grid0->getOctopus($i, $j)->getOctopus()->getEnergyLevel(),
                    'difference on '.$i.', '.$j
                );
            }
        }
        $this->assertEquals(35, $grid0->getFlashCounter());
        $grid0->step();
        $grid0->step();
        $grid0->step();
        $grid0->step();
        $grid0->step();
        $grid0->step();
        $grid0->step();
        $grid0->step();

        $this->assertEquals(204, $grid0->getFlashCounter());

        for($i = 0; $i < 90; $i++) {
            $grid0->step();
        }
        $this->assertEquals(1656, $grid0->getFlashCounter());
    }

    public function testSync()
    {
        $input0 = [
            '5483143223',
            '2745854711',
            '5264556173',
            '6141336146',
            '6357385478',
            '4167524645',
            '2176841721',
            '6882881134',
            '4846848554',
            '5283751526',
        ];

        $grid = new DumboOctopiGrid($input0);

        while(!$grid->detectSync()) {
            $grid->step();
        }
        $this->assertEquals(195, $grid->getStepCounter());
    }
}