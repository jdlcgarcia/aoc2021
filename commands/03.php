<?php

require_once '../vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\DiagnosticReport;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$movementsList = $parser->loadListFile('../input/03.txt');
$diagnosticReport = new DiagnosticReport($movementsList, 12);
$diagnosticReport->process();
echo $diagnosticReport->powerConsumption() . PHP_EOL;
