<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\CrabSubmarine;
use Jdlcgarcia\Aoc2021\Submarine\Services\CrabSubmarineOptimizer;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$crabSubmarinePositions = $parser->loadIntegerListFile('input/07.txt', ',');
$crabSubmarines = [];
foreach($crabSubmarinePositions as $position) {
    $crabSubmarines[] = new CrabSubmarine($position);
}
$optimizer = new CrabSubmarineOptimizer($crabSubmarines);
echo $optimizer->getBestPosition() . PHP_EOL;