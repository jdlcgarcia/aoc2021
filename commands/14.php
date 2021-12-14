<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\Polymer;
use Jdlcgarcia\Aoc2021\Submarine\PolymerInsertionRule;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$rawRules = $parser->loadListFile('input/14.txt');
$dictionary = [];
foreach ($rawRules as $rawRule) {
    $rule = new PolymerInsertionRule($rawRule);
    $dictionary[$rule->getPair()] = $rule;
}
$polymer = new Polymer('HBCHSNFFVOBNOFHFOBNO', $dictionary);
for ($i = 0; $i < 10; $i++) {
    $polymer->step();
}
echo $polymer->getSummary() . PHP_EOL;