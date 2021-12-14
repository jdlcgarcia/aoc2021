<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class Polymer
{
    private string $chain;
    /** @var PolymerInsertionRule[] */
    private array $dictionary;
    private array $summary = [];
    private int $maxOccurrence;
    private int $minOccurrence;
    private array $sumCache = [];

    /**
     * @param string $chain
     * @param PolymerInsertionRule[] $dictionary
     */
    public function __construct(string $chain, array $dictionary)
    {
        $this->chain = $chain;
        $this->dictionary = $dictionary;
        $this->resetSummary();
    }

    public function process(int $n)
    {
        $this->summary = [];
        $this->resetSummary();
        for ($i = 0; $i < strlen($this->chain) - 1; $i++) {
            $pair = $this->chain[$i] . $this->chain[$i + 1];
            $this->summary = $this->sum($this->summary, $this->smartStep($pair, $n - 1));
            echo "finished pair " . $pair . PHP_EOL;
        }
        $this->updateMaxMin();
    }

    private function smartStep(string $pair, int $step): array
    {
        if (isset($this->sumCache[$pair . $step])) {
            return $this->sumCache[$pair . $step];
        }

        if (isset($this->dictionary[$pair])) {
            $char = $this->dictionary[$pair]->getInsertion();
            if ($step !== 0) {
                $result = $this->sum(
                    $this->smartStep($pair[0] . $char, $step - 1),
                    $this->smartStep($char . $pair[1], $step - 1)
                );
                $result = $this->sum(
                    $result,
                    [$char => 1]
                );
            } else {
                $result = [$char => 1];
            }

            $this->sumCache[$pair . $step] = $result;
            return $result;
        }

        return [];
    }

    public function naiveStep()
    {
        $newChain = '';
        for ($i = 0; $i < strlen($this->chain) - 1; $i++) {
            $pair = $this->chain[$i] . $this->chain[$i + 1];
            $addToChain = $this->chain[$i];
            if (isset($this->dictionary[$pair])) {
                $addToChain .= $this->dictionary[$pair]->getInsertion();
                if (!isset($this->summary[$this->dictionary[$pair]->getInsertion()])) {
                    $this->summary[$this->dictionary[$pair]->getInsertion()] = 0;
                }
                $this->summary[$this->dictionary[$pair]->getInsertion()]++;
            } else {
                $addToChain = '_';
            }
            $newChain .= $addToChain;
        }
        $newChain .= $this->chain[strlen($this->chain) - 1];
        $this->chain = $newChain;
        $this->updateMaxMin();
    }

    /**
     * @return string
     */
    public function getChain(): string
    {
        return $this->chain;
    }

    public function getSummary(): int
    {
        return $this->maxOccurrence - $this->minOccurrence;
    }

    /**
     * @return void
     */
    private function updateMaxMin(): void
    {
        $this->maxOccurrence = max($this->summary);
        $this->minOccurrence = min($this->summary);
    }

    public function quickStepCount(int $int): void
    {

    }

    /**
     * @return void
     */
    private function resetSummary(): void
    {
        foreach (str_split($this->getChain()) as $char) {
            if (!isset($this->summary[$char])) {
                $this->summary[$char] = 0;
            }
            $this->summary[$char]++;
        }
        $this->updateMaxMin();
    }

    private function sum(array $a, array $b): array
    {
        $sums = [];

        foreach (array_keys($a + $b) as $item) {
            $sums[$item] = ($a[$item] ?? 0) + ($b[$item] ?? 0);
        }

        return $sums;
    }
}