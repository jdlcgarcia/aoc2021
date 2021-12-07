<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\DiagnosticReport;
use Jdlcgarcia\Aoc2021\Submarine\HydrotermalCloud;
use Jdlcgarcia\Aoc2021\Submarine\Point;
use Jdlcgarcia\Aoc2021\Submarine\Services\Hydrotermal90DegreeRadar;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$rawHydrotermalClouds = $parser->loadListFile('input/05.txt');
$hydrotermalClouds = [];
foreach($rawHydrotermalClouds as $rawHydrotermalCloud) {
    if ($rawHydrotermalCloud !== '') {
        list($origin, $end) = explode(' -> ', $rawHydrotermalCloud);
        list($x1, $y1) = explode(',', $origin);
        list($x2, $y2) = explode(',', $end);
        $hydrotermalClouds[] = new HydrotermalCloud(new Point($x1, $y1), new Point($x2, $y2));
    }
}

$service = new Hydrotermal90DegreeRadar($hydrotermalClouds);
echo $service->getOverlappingPositions() . PHP_EOL;
