<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class DiagnosticReport
{
    const SIZE = 5;
    /** @var string[] */
    private array $report;
    /** @var int[] */
    private array $counter = [
        1 => [0, 0, 0, 0, 0],
        0 => [0, 0, 0, 0, 0]
    ];
    private int $gammaRate = 0;
    private int $epsilonRate = 0;

    public function __construct(array $binaryNumbers)
    {
        $this->report = $binaryNumbers;
    }

    public function process(): void
    {
        foreach ($this->report as $reportLine) {
            $this->countLine($reportLine);
        }
    }

    public function powerConsumption(): int
    {
        $gammaRate = [];
        $epsilonRate = [];
        for ($i = 0; $i < self::SIZE; $i++) {
            if ($this->counter[0][$i] > $this->counter[1][$i]) {
                $gammaRate[] = 1;
                $epsilonRate[] = 0;
            } else {
                $gammaRate[] = 0;
                $epsilonRate[] = 1;
            }
        }
        $this->gammaRate = bindec(implode('', $gammaRate));
        $this->epsilonRate = bindec(implode('', $epsilonRate));

        return $this->gammaRate * $this->epsilonRate;
    }

    private function countLine($digits): void
    {
        for ($i = 0; $i < self::SIZE; $i++) {
            if ($digits[$i] === '0') {
                $this->counter[0][$i]++;
            } else {
                $this->counter[1][$i]++;
            }
        }
    }
}