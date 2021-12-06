<?php

require_once 'vendor/autoload.php';

use Jdlcgarcia\Aoc2021\Submarine\BingoBoard;
use Jdlcgarcia\Aoc2021\Submarine\Services\BingoService;
use Jdlcgarcia\Aoc2021\Utils\FileParser;

$parser = new FileParser();
$bingoRawGame = $parser->loadListFile('input/04.txt');
$drawList = array_map('intval', explode(',', array_shift($bingoRawGame)));
$boardList = [];
while (!empty($bingoRawGame)) {
    array_shift($bingoRawGame);
    $rows = [];
    $row1 = array_map('intval', preg_split('/\s+/', trim(array_shift($bingoRawGame))));
    $row2 = array_map('intval', preg_split('/\s+/', trim(array_shift($bingoRawGame))));
    $row3 = array_map('intval', preg_split('/\s+/', trim(array_shift($bingoRawGame))));
    $row4 = array_map('intval', preg_split('/\s+/', trim(array_shift($bingoRawGame))));
    $row5 = array_map('intval', preg_split('/\s+/', trim(array_shift($bingoRawGame))));
    $boardList[] = new BingoBoard([$row1, $row2, $row3, $row4, $row5]);
}

$game = new BingoService($boardList);

foreach($drawList as $drawnNumber) {
    $game->drawLastWinner($drawnNumber);
}

echo $game->getLastScore() . PHP_EOL;