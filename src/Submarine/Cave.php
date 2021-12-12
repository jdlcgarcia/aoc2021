<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

use JetBrains\PhpStorm\Pure;

class Cave
{
    private string $label;
    /** @var Cave[]  */
    private array $connections = [];

    /**
     * @param string $label
     */
    public function __construct(string $label)
    {
        $this->label = $label;
    }

    public function connect(Cave $cave)
    {
        if (!isset($this->connections[$cave->getLabel()]) && $cave->getLabel() !== $this->getLabel()) {
            $this->addConnection($cave);
            $cave->addConnection($this);
        }
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return Cave[]
     */
    public function getConnections(): array
    {
        return $this->connections;
    }

    /**
     * @param Cave $cave
     * @return void
     */
    private function addConnection(Cave $cave): void
    {
        $this->connections[$cave->getLabel()] = $cave;
    }

    #[Pure] public function isBig(): bool
    {
        return strtoupper($this->getLabel()) === $this->getLabel();
    }
}