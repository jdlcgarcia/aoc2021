<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class PolymerInsertionRule
{

    private string $pair;
    private string $insertion;

    public function __construct(string $input)
    {
        list($this->pair, $this->insertion) = explode(' -> ', $input);
    }

    /**
     * @return string
     */
    public function getPair(): string
    {
        return $this->pair;
    }

    /**
     * @return string
     */
    public function getInsertion(): string
    {
        return $this->insertion;
    }

    public function getResult(): string
    {
        return $this->pair[0] . $this->insertion . $this->pair[1];
    }

}