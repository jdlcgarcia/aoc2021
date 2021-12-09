<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\CrabSubmarine;
use Jdlcgarcia\Aoc2021\Submarine\Services\CrabSubmarineOptimizer;
use Jdlcgarcia\Aoc2021\Submarine\Services\SevenSegmentGuesser;
use Jdlcgarcia\Aoc2021\Submarine\SevenSegmentDisplay;
use Jdlcgarcia\Aoc2021\Submarine\SevenSegmentNote;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$notes = $parser->loadListFile('input/08.txt');
$sevenSegmentNotes = [];
foreach($notes as $note) {
    if (!empty($note)) {
        $sevenSegmentNotes[] = new SevenSegmentNote($note);
    }
}
$display = new SevenSegmentDisplay($sevenSegmentNotes);
$display->processRightValues();
echo $display->getUniqueSegmentCombinationCounter() . PHP_EOL;
$sum = 0;
foreach($notes as $line) {
    if (!empty($line)) {
        $guesser = new SevenSegmentGuesser($line);
        $sum += $guesser->guess();
    }
}
echo $sum . PHP_EOL;