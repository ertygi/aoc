<?php

namespace AoC;

use AoC\PuzzleInput;

/**
 * Class DayThree
 * @package AoC
 */
class DayThree implements DaysOfAdventInterface
{
    const RIGHT_STEPS = 3;
    const TREE        = '#';

    /** @var array */
    protected array  $map    = [];
    protected int    $steps  = 0;
    protected int    $trees  = 0;
    protected int    $bottom = 0;
    protected array  $slopes = [
        ['right' => 1, 'down' => 1,],
        ['right' => 3, 'down' => 1],
        ['right' => 5, 'down' => 1],
        ['right' => 7, 'down' => 1],
        ['right' => 1, 'down' => 2],
    ];

    /**
     * DayThree constructor.
     * @param array|null $input
     */
    public function __construct(?array $input=null)
    {
        if (empty($input)) {
            $input = PuzzleInput::getData(3);
        }
        foreach ($input as $item) {
            $this->map [] = str_split($item);
        }
        $this->map    = array_filter($this->map);
        $this->bottom = count($this->map);
    }

    /**
     * @return int
     */
    public function partOne(): int
    {
        $repeatsPattern = ceil(count($this->map) / 2);
        $trees          = 0;
        foreach ($this->map as $line => $rowMap) {
            $rowMap = $this->repeatMerge($rowMap, $repeatsPattern);

            if ($rowMap[$this->steps] === self::TREE && $line != 0) {
                $rowMap[$this->steps];
                $trees += 1;
            }
            $this->steps = $this->steps + self::RIGHT_STEPS;
            continue;
        }

        return $trees;
    }

    /**
     * @return int
     */
    public function partTwo(): int
    {
        $repeatsPattern = count($this->map) * 2;
        $trees          = [];
        $jump           = false;
        foreach ($this->slopes as $key => $slope) {
            $treesPerStep = 0;
            $steps        = 0;

            foreach ($this->map as $line => $rowMap) {
                $rowMap = $this->repeatMerge($rowMap, $repeatsPattern);
                if ($jump) {
                    $jump = false;
                    continue;
                }

                if ($rowMap[$steps] === self::TREE && $line != 0) {
                    $rowMap[$steps];
                    $treesPerStep += 1;
                }
                $steps = $steps + $slope['right'];
                if ($slope['down'] === 2) {
                    $jump = true;
                }
            }
            $trees[] = $treesPerStep;
        }

        return array_product($trees);
    }

    /**
     * @param $array
     * @param $rCount
     * @return array
     */
    protected function repeatMerge($array, $rCount): array
    {
        return call_user_func_array('array_merge', array_fill(1, $rCount, $array));
    }

}

