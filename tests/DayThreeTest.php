<?php

namespace AoC\Tests;

use AoC\DayThree;
use AoC\PuzzleInput;
use PHPUnit\Framework\TestCase;

final class DayThreeTest extends TestCase
{
    protected string $testData = '..##.......
#...#...#..
.#....#..#.
..#.#...#.#
.#...##..#.
..#.##.....
.#.#.#....#
.#........#
#.##...#...
#...##....#
.#..#...#.#';

    /** @var DayThree  */
    protected DayThree $dayThree;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $input          = PuzzleInput::transformTestInput($this->testData);
        $this->dayThree = new DayThree($input);
    }

    public function testPartOne(): void
    {
        $this->assertEquals(7, $this->dayThree->partOne());
    }
    public function testPartTwo(): void
    {
        $this->assertEquals(336, $this->dayThree->partTwo());
    }

}