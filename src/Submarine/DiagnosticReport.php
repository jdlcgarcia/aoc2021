<?php

namespace Jdlcgarcia\Aoc2021\Submarine;

class DiagnosticReport
{
    private int $sizeOfLine;
    /** @var string[] */
    private array $report;
    /** @var int[] */
    private array $counter;
    private int $gammaRate;
    private int $epsilonRate;
    private int $oxygenGeneratorRate;
    private int $co2ScrubberRate;

    public function __construct(array $binaryNumbers, int $sizeOfLine)
    {
        $this->report = $binaryNumbers;
        $this->sizeOfLine = $sizeOfLine;
    }

    public function process(): void
    {
        $this->countLines($this->report);
        $auxCounter = $this->counter;

        $this->getGammaAndEpsilon();

        $oxygenGeneratorCandidates = $this->getOxygenGeneratorRate();
        $this->counter = $auxCounter;

        $co2ScrubberCandidates = $this->getCo2ScrubberRate();
        $this->counter = $auxCounter;

        $this->oxygenGeneratorRate = bindec(reset($oxygenGeneratorCandidates));
        $this->co2ScrubberRate = bindec(reset($co2ScrubberCandidates));
    }

    public function powerConsumption(): int
    {
        return $this->gammaRate * $this->epsilonRate;
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

    public function lifeSupportRating(): int
    {
        return $this->oxygenGeneratorRate * $this->co2ScrubberRate;
    }

    private function filterCandidates(array $candidates, string $valueToKeep, int $positionToFilter): array
    {
        if (count($candidates) > 1) {
            foreach($candidates as $index => $candidate) {
                if ($candidate[$positionToFilter] !== $valueToKeep) {
                    unset($candidates[$index]);
                }
            }
        }

        return $candidates;
    }

    private function countLines($report): void
    {
        $emptyArray = [];
        for($i = 0; $i < $this->sizeOfLine; $i++) {
            $emptyArray[] = 0;
        }
        $this->counter = [
            1 => $emptyArray,
            0 => $emptyArray
        ];
        foreach ($report as $reportLine) {
            if ($reportLine !== '') {
                $this->countLine($reportLine);
            }
        }
    }

    private function getGammaAndEpsilon(): void
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

        $this->gammaRate = bindec(implode('', $gammaRate));
        $this->epsilonRate = bindec(implode('', $epsilonRate));
    }

    private function getOxygenGeneratorRate(): array
    {
        $oxygenGeneratorCandidates = $this->report;
        for ($i = 0; $i < $this->sizeOfLine; $i++) {
            if ($this->counter[1][$i] >= $this->counter[0][$i]) {
                $oxygenGeneratorCandidates = $this->filterCandidates($oxygenGeneratorCandidates, '1', $i);
            } else {
                $oxygenGeneratorCandidates = $this->filterCandidates($oxygenGeneratorCandidates, '0', $i);
            }
            $this->countLines($oxygenGeneratorCandidates);
        }
        return $oxygenGeneratorCandidates;
    }

    private function getCo2ScrubberRate(): array
    {
        $co2ScrubberCandidates = $this->report;

        for ($i = 0; $i < $this->sizeOfLine; $i++) {
            if ($this->counter[0][$i] <= $this->counter[1][$i]) {
                $co2ScrubberCandidates = $this->filterCandidates($co2ScrubberCandidates, '0', $i);
            } else {
                $co2ScrubberCandidates = $this->filterCandidates($co2ScrubberCandidates, '1', $i);
            }
            $this->countLines($co2ScrubberCandidates);
        }
        return $co2ScrubberCandidates;
    }
}