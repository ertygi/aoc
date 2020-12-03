<?php

namespace AoC\Tests;

use AoC\DayFour;
use AoC\DayThree;
use AoC\PuzzleInput;
use PHPUnit\Framework\TestCase;

final class DayFourTest extends TestCase
{
    protected string $testData = '';

    /** @var DayFour  */
    protected DayFour $dayFour;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $input         = PuzzleInput::transformTestInput($this->testData);
        $this->dayFour = new DayFour($input);
    }

    public function testPartOne(): void
    {
        $this->assertEquals(7, $this->dayFour->partOne());
    }
    public function testPartTwo(): void
    {
        $this->assertEquals(336, $this->dayFour->partTwo());
    }

}