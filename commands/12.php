<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\DumboOctopiGrid;
use Jdlcgarcia\Aoc2021\Submarine\Services\PathFinder;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$paths = $parser->loadListFile('input/12.txt');
$pathFinder = new PathFinder($paths);
$possiblePaths = $pathFinder->findPaths();
echo count($possiblePaths) . PHP_EOL;
$possiblePaths = $pathFinder->findPathsSecondTry();
echo count($possiblePaths) . PHP_EOL;