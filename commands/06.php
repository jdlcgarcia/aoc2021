<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\LanternfishSchool;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$lanternfishTimers = $parser->loadIntegerListFile('input/06.txt', ',');
$school = new LanternfishSchool($lanternfishTimers);
$school->fastForward(80);
echo $school->getSchoolSize() . PHP_EOL;
$school->fastForward(176);
echo $school->getSchoolSize() . PHP_EOL;
