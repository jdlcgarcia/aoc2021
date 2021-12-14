<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\ActivatorPage;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$coordinates = $parser->loadListFile('input/13.txt');
$page = new ActivatorPage($coordinates);
$folds = $parser->loadListFile('input/13fold.txt');
foreach ($folds as $fold) {
    $fold = str_replace('fold along ', '', $fold);
    list($axis, $value) = explode('=', $fold);
    if ($axis === 'x') {
        $page->foldX($value);
    } else {
        $page->foldY($value);
    }
    echo $page->getMarkCounter() . PHP_EOL;
}
$page->draw();