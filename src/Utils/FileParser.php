<?php

namespace Jdlcgarcia\Aoc2021\Utils;

use JetBrains\PhpStorm\Pure;

class FileParser
{
    /**
     * @param string $filename
     * @return int[]
     */
    #[Pure] public function loadIntegerListFile(string $filename): array
    {
        $integerList = [];
        $stringList = explode(PHP_EOL, $this->loadFileContent($filename));
        foreach($stringList as $item) {
            $integerList[] = (int)$item;
        }

        return $integerList;
    }

    private function loadFileContent(string $filename): string
    {
        return file_get_contents($filename, FILE_USE_INCLUDE_PATH);
    }

    #[Pure] public function loadListFile(string $filename): array
    {
        return explode(PHP_EOL, $this->loadFileContent($filename));
    }
}