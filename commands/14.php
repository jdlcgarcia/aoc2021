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
$polymer->process(10);
echo "10) ".$polymer->getSummary() . PHP_EOL;
echo "---------".PHP_EOL;
$polymer->process(40);
echo "40) ".$polymer->getSummary() . PHP_EOL;