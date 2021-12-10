<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\CrabSubmarine;
use Jdlcgarcia\Aoc2021\Submarine\HeightMap;
use Jdlcgarcia\Aoc2021\Submarine\Services\CrabSubmarineOptimizer;
use Jdlcgarcia\Aoc2021\Submarine\Services\LowPointFinder;
use Jdlcgarcia\Aoc2021\Submarine\Services\SevenSegmentGuesser;
use Jdlcgarcia\Aoc2021\Submarine\Services\SyntaxChecker;
use Jdlcgarcia\Aoc2021\Submarine\SevenSegmentDisplay;
use Jdlcgarcia\Aoc2021\Submarine\SevenSegmentNote;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$code = $parser->loadListFile('input/10.txt');
$checker = new SyntaxChecker($code);
echo $checker->getSyntaxErrorScore() . PHP_EOL;
echo $checker->getAutocompleteScore() . PHP_EOL;