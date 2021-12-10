<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\CrabSubmarine;
use Jdlcgarcia\Aoc2021\Submarine\HeightMap;
use Jdlcgarcia\Aoc2021\Submarine\Services\CrabSubmarineOptimizer;
use Jdlcgarcia\Aoc2021\Submarine\Services\LowPointFinder;
use Jdlcgarcia\Aoc2021\Submarine\Services\SevenSegmentGuesser;
use Jdlcgarcia\Aoc2021\Submarine\SevenSegmentDisplay;
use Jdlcgarcia\Aoc2021\Submarine\SevenSegmentNote;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$heatMapInput = $parser->loadListFile('input/09.txt');
$lowPointFinder = new LowPointFinder(new HeightMap($heatMapInput), new HeightMap($heatMapInput));
echo $lowPointFinder->getRiskLevel() . PHP_EOL;
echo $lowPointFinder->getThreeWorstBasins() . PHP_EOL;