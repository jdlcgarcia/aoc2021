<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\ActivatorPage;
use PHPUnit\Framework\TestCase;

class ActivatorPageTest extends TestCase
{
    public function testCreatePage()
    {
        $input = [
            '6,10',
            '0,14',
            '9,10',
            '0,3',
            '10,4',
            '4,11',
            '6,0',
            '6,12',
            '4,1',
            '0,13',
            '10,12',
            '3,4',
            '3,0',
            '8,4',
            '1,10',
            '2,14',
            '8,10',
            '9,0',
        ];
        $page = new ActivatorPage($input);
        //$page->draw();
        $page->foldY(7);
        $this->assertEquals(17, $page->getMarkCounter());
        $page->foldX(5);
        $page->draw();
        $this->assertEquals(16, $page->getMarkCounter());
    }
}