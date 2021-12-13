<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\Cave;
use JetBrains\PhpStorm\Pure;

class PathFinder
{
    /** @var Cave[]  */
    private array $caves = [];
    /** @var Cave[] */
    private array $paths = [];
    /** @var Cave[] */
    private array $pathsWithCounters = [];

    /**
     * @param array $caves
     */
    public function __construct(array $caves)
    {
        foreach($caves as $caveLine) {
            list($origin, $end) = explode('-', $caveLine);
            if (!isset($this->caves[$origin])) {
                $this->caves[$origin] = new Cave($origin);
            }
            if (!isset($this->caves[$end])) {
                $this->caves[$end] = new Cave($end);
            }
            $this->caves[$origin]->connect($this->caves[$end]);
        }
    }

    public function getCaves(): array
    {
        return $this->caves;
    }

    public function findPaths()
    {
        foreach($this->caves['start']->getConnections() as $connection) {
            $this->step($connection, [$this->caves['start']]);
        }

        return $this->paths;
    }

    private function step(Cave $connection, array $array)
    {
        $formedPath = array_merge($array, [$connection]);
        if  ($connection->getLabel() === 'end') {
            $this->paths[] = $formedPath;
        } else {
            foreach($connection->getConnections() as $nextLevelConnection) {
                if ($this->allowedForPath($formedPath, $nextLevelConnection)) {
                    $this->step($nextLevelConnection, $formedPath);
                }
            }
        }
    }

    /**
     * @param Cave[] $formedPath
     * @param Cave $possibleStep
     * @return bool
     */
    #[Pure] private function allowedForPath(array $formedPath, Cave $possibleStep): bool
    {
        foreach($formedPath as $cave) {
            if ($possibleStep->getLabel() === $cave->getLabel() && !$cave->isBig()) {
                return false;
            }
        }

        return true;
    }

    public function findPathsSecondTry(): array
    {
        foreach($this->caves['start']->getConnections() as $connection) {
            $this->stepSecondTry($connection, [$this->caves['start']]);
        }

        return $this->pathsWithCounters;
    }

    private function stepSecondTry(Cave $connection, array $array)
    {
        $formedPath = array_merge($array, [$connection]);
        if  ($connection->getLabel() === 'end') {
            $this->pathsWithCounters[] = $formedPath;
        } else {
            foreach($connection->getConnections() as $nextLevelConnection) {
                if ($this->allowedForPathSecondTry($formedPath, $nextLevelConnection)) {
                    $this->stepSecondTry($nextLevelConnection, $formedPath);
                }
            }
        }
    }

    private function allowedForPathSecondTry(array $formedPath, Cave $possibleStep): bool
    {
        foreach($formedPath as $cave) {
            if ($possibleStep->getLabel() === $cave->getLabel() && !$cave->isBig()) {
                if ($possibleStep->getLabel() === 'start') {
                    return false;
                }
                if (!$this->getAllowAnotherSmall($formedPath)) {
                    return false;
                }
            }
        }

        return true;
    }

    /** @var Cave[] $formedPath */
    private function getAllowAnotherSmall(array $formedPath)
    {
        $caves = [];
        foreach($formedPath as $cave) {
            if (!$cave->isBig()) {
                if (!isset($caves[$cave->getLabel()])) {
                    $caves[$cave->getLabel()] = 0;
                }
                $caves[$cave->getLabel()]++;
            }
        }

        $keysWithDuplicates = array_filter($caves, function($v){
            return $v > 1;
        });

        return sizeof($keysWithDuplicates) === 0;
    }
}