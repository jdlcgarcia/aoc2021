<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\DumboOctopiGrid;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$octopi = $parser->loadListFile('input/11.txt');
$grid = new DumboOctopiGrid($octopi);
while(!$grid->detectSync()) {
    $grid->step();
    if ($grid->getStepCounter() === 100) {
        echo $grid->getFlashCounter() . PHP_EOL;
    }
}
echo $grid->getStepCounter() . PHP_EOL;