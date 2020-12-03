<?php

namespace AoC;

use AoC\PuzzleInput;

class DayTwo implements DaysOfAdventInterface
{
    /** (position) (position) (character) (password) */
    protected $pattern = '/(\d+)-(\d+) ([a-z]): (\w+)/';

    public function partOne(): int
    {
        $input   = PuzzleInput::getData(2);

        $count   = 0;
        foreach ($input as $item) {
            preg_match($this->pattern, $item, $matches);
            if ($matches[1] <= substr_count($matches[4], $matches[3]) && substr_count($matches[4], $matches[3]) <= $matches[2]) {
                $count++;
            }
        }

        return $count;
    }

    /**
     * @return int
     */
    public function partTwo(): int
    {
        $input   = PuzzleInput::getData(2);
        $count   = 0;

        foreach ($input as $item) {
            preg_match($this->pattern, $item, $matches);
            if ($matches[1] === 0 || $matches[2] === 0) {
                continue;
            }

            $firstPosition  = $matches[1] - 1;
            $secondPosition = $matches[2] - 1;

            $isFirstPosition = $firstPosition === stripos($matches[4], $matches[3], $firstPosition);
            $isSecondPosition = $secondPosition === stripos($matches[4], $matches[3], $secondPosition);

            if (($isFirstPosition && !$isSecondPosition) || (!$isFirstPosition && $isSecondPosition)){
                $count++;
                continue;
            }
        }

        return $count;
    }
}

