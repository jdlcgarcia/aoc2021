<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\Position;
use Jdlcgarcia\Aoc2021\Submarine\Services\MoveService;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$movementsList = $parser->loadListFile('input/02.txt');
$service = new MoveService(new Position());
foreach($movementsList as $movement) {
    $service->processMove($movement);
}
echo $service->getScalarPosition() . PHP_EOL;