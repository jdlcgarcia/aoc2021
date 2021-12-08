<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Fish\Lanternfish;
use Jdlcgarcia\Aoc2021\Fish\LanternfishSchool;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$lanternfishTimers = $parser->loadIntegerListFile('input/06.txt', ',');
$membersOfSchool = [];
foreach ($lanternfishTimers as $timer) {
    $membersOfSchool[] = new Lanternfish($timer);
}
$school = new LanternfishSchool($membersOfSchool);
$school->fastForward(80);
echo count($school->getSchool()) . PHP_EOL;