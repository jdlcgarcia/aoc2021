<?php

namespace Jdlcgarcia\Aoc2021\Fish;

class LanternfishSchool
{
    /** @var Lanternfish[]  */
    private array $school;

    /**
     * @param array $initialSchool
     */
    public function __construct(array $initialSchool)
    {
        $this->school = $initialSchool;
    }

    public function progress()
    {
        foreach($this->school as $lanternfish) {
            $babyLanternfish = $lanternfish->progress();
            if (!is_null($babyLanternfish)) {
                $this->school[] = $babyLanternfish;
            }
        }
    }

    public function fastForward(int $n)
    {
        for($i=0; $i < $n; $i++) {
            $this->progress();
        }
    }

    /**
     * @return Lanternfish[]
     */
    public function getSchool(): array
    {
        return $this->school;
    }
}