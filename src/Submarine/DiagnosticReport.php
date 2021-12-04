<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class DiagnosticReport
{
    private int $sizeOfLine;
    /** @var string[] */
    private array $report;
    /** @var int[] */
    private array $counter;

    public function __construct(array $binaryNumbers, int $sizeOfLine)
    {
        $this->report = $binaryNumbers;
        $this->sizeOfLine = $sizeOfLine;
        $emptyArray = [];
        for($i = 0; $i < $this->sizeOfLine; $i++) {
            $emptyArray[] = 0;
        }
        $this->counter = [
            1 => $emptyArray,
            0 => $emptyArray
        ];
    }

    public function process(): void
    {
        foreach ($this->report as $reportLine) {
            if ($reportLine !== '') {
                $this->countLine($reportLine);
            }
        }
    }

    public function powerConsumption(): int
    {
        $gammaRate = [];
        $epsilonRate = [];
        for ($i = 0; $i < $this->sizeOfLine; $i++) {
            if ($this->counter[0][$i] > $this->counter[1][$i]) {
                $gammaRate[] = 1;
                $epsilonRate[] = 0;
            } else {
                $gammaRate[] = 0;
                $epsilonRate[] = 1;
            }
        }

        return bindec(implode('', $gammaRate)) * bindec(implode('', $epsilonRate));
    }

    private function countLine($digits): void
    {
        for ($i = 0; $i < $this->sizeOfLine; $i++) {
            if ($digits[$i] === '0') {
                $this->counter[0][$i]++;
            } else {
                $this->counter[1][$i]++;
            }
        }
    }
}