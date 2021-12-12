<?php

namespace Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\Services\PathFinder;
use PHPUnit\Framework\TestCase;

class PathFinderTest extends TestCase
{
    public function testCreateSimplePath()
    {
        $path = [
            'start-A',
            'start-b',
            'A-c',
            'A-b',
            'b-d',
            'A-end',
            'b-end',
        ];
        $pathFinder = new PathFinder($path);
        $this->assertCount(6, $pathFinder->getCaves());
        $this->assertCount(10, $pathFinder->findPaths());
    }

    public function testCreateLargerPath()
    {
        $path = [
            'dc-end',
            'HN-start',
            'start-kj',
            'dc-start',
            'dc-HN',
            'LN-dc',
            'HN-end',
            'kj-sa',
            'kj-HN',
            'kj-dc'
        ];
        $pathFinder = new PathFinder($path);
        $this->assertCount(7, $pathFinder->getCaves());
        $this->assertCount(19, $pathFinder->findPaths());
    }

    public function testCreateEvenLargerPath()
    {
        $path = [
            'fs-end',
            'he-DX',
            'fs-he',
            'start-DX',
            'pj-DX',
            'end-zg',
            'zg-sl',
            'zg-pj',
            'pj-he',
            'RW-he',
            'fs-DX',
            'pj-RW',
            'zg-RW',
            'start-pj',
            'he-WI',
            'zg-he',
            'pj-fs',
            'start-RW',
        ];
        $pathFinder = new PathFinder($path);
        $this->assertCount(226, $pathFinder->findPaths());
    }
}