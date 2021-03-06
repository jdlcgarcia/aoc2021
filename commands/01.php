<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\Sonar;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$depths = $parser->loadIntegerListFile('input/01.txt', PHP_EOL);
$sonar = new Sonar();
echo $sonar->countDepthIncreases($depths) . PHP_EOL;
echo $sonar->countThreeMeasurementSlidingWindowDepthIncreases($depths) . PHP_EOL;