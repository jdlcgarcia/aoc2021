<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class Polymer
{
    private string $chain;
    /** @var PolymerInsertionRule[] */
    private array $dictionary;

    /**
     * @param string $chain
     * @param PolymerInsertionRule[] $dictionary
     */
    public function __construct(string $chain, array $dictionary)
    {
        $this->chain = $chain;
        $this->dictionary = $dictionary;
    }

    public function step()
    {
        $parts = [];
        foreach (str_split($this->chain) as $itemIndex => $char) {
            if (isset($this->chain[$itemIndex + 1])) {
                $parts[] = $char . $this->chain[$itemIndex + 1];
            }
        }
        foreach ($parts as $partIndex => $part) {
            if (isset($this->dictionary[$part])) {
                $parts[$partIndex] = substr_replace($part, $this->dictionary[$part]->getResult(), 0);
            }
        }
        $this->chain = substr($parts[0], 0, 1);
        foreach ($parts as $part) {
            $this->chain .= substr($part, 1, strlen($part));
        }
    }

    /**
     * @return string
     */
    public function getChain(): string
    {
        return $this->chain;
    }

    public function getSummary()
    {
        $summary = [];
        foreach(str_split($this->getChain()) as $char) {
            if (!isset($summary[$char])) {
                $summary[$char] = 0;
            }
            $summary[$char]++;
        }

        return max($summary) - min($summary);
    }
}