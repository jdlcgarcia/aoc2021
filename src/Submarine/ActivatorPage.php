<?php

namespace Jdlcgarcia\Aoc2021\Submarine;


class ActivatorPage
{
    const DOT = '.';
    const MARK = '#';
    private array $dots;
    /** @var Point[] */
    private array $marks = [];
    private int $markCounter = 0;

    public function __construct(array $marks)
    {
        $maxX = 0;
        $maxY = 0;
        foreach ($marks as $mark) {
            list($x, $y) = explode(',', $mark);
            if ($x > $maxX) {
                $maxX = $x;
            }
            if ($y > $maxY) {
                $maxY = $y;
            }
            $this->marks[] = new Point($x, $y);
        }

        for ($i = 0; $i <= $maxY; $i++) {
            for ($j = 0; $j <= $maxX; $j++) {
                $this->dots[$i][$j] = self::DOT;
            }
        }

        foreach ($this->marks as $mark) {
            $this->dots[$mark->getY()][$mark->getX()] = self::MARK;
        }
    }

    public function draw()
    {
        foreach ($this->dots as $row) {
            foreach ($row as $cell) {
                echo $cell;
            }
            echo PHP_EOL;
        }
    }

    public function foldX(int $axis)
    {
        foreach ($this->dots as $rowIndex => $row) {
            $this->dots[$rowIndex][$axis] = '|';
        }

        foreach ($this->dots as $rowIndex => $row) {
            $offset = 1;
            while ($axis - $offset >= 0 || $axis + $offset < count($this->dots[0])) {
                $overlap = $this->getMarkFromXAxisOffset($axis, $offset, $rowIndex);
                $this->dots[$rowIndex][$axis - $offset] = $overlap;
                $offset++;
            }
        }

        $width = count($this->dots[0]);
        foreach ($this->dots as $rowIndex => $row) {
            for ($i = $axis; $i < $width; $i++) {
                unset($this->dots[$rowIndex][$i]);
            }
        }
    }

    public function foldY(int $axis)
    {
        foreach ($this->dots[$axis] as $columnIndex => $column) {
            $this->dots[$axis][$columnIndex] = '-';
        }

        foreach ($this->dots[$axis] as $columnIndex => $column) {
            $offset = 1;
            while ($axis - $offset >= 0 || $axis + $offset < count($this->dots)) {
                $overlap = $this->getMarkFromYAxisOffset($axis, $offset, $columnIndex);
                $this->dots[$axis - $offset][$columnIndex] = $overlap;
                $offset++;
            }
        }

        $height = count($this->dots);
        for ($i = $axis; $i < $height; $i++) {
            unset($this->dots[$i]);
        }
    }

    /**
     * @param int $axis
     * @param int $offset
     * @param int $columnIndex
     * @return mixed
     */
    private function getMarkFromYAxisOffset(int $axis, int $offset, int $columnIndex): string
    {
        return (
            $this->dots[$axis - $offset][$columnIndex] === self::MARK ||
            $this->dots[$axis + $offset][$columnIndex] === self::MARK
        ) ? self::MARK : self::DOT;
    }

    /**
     * @return int
     */
    public function getMarkCounter(): int
    {
        $this->markCounter = 0;
        foreach ($this->dots as $row) {
            foreach ($row as $cell) {
                if ($cell === self::MARK) {
                    $this->markCounter++;
                }
            }
        }

        return $this->markCounter;
    }

    private function getMarkFromXAxisOffset(int $axis, int $offset, int $rowIndex): string
    {
        return (
            $this->dots[$rowIndex][$axis - $offset] === self::MARK ||
            $this->dots[$rowIndex][$axis + $offset] === self::MARK
        ) ? self::MARK : self::DOT;
    }
}