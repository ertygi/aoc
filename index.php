<?php

require __DIR__ . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use AoC\DayFour;
use AoC\DayOne;
use AoC\DaysOfAdventInterface;
use AoC\DayTwo;
use AoC\DayThree;

/**
 * @param array $days
 */
function showResults(array $days)
{
    foreach ($days as $day) {
        if (!$day instanceof DaysOfAdventInterface) {
            continue;
        }
        $dayName = str_replace('AoC\\', '', get_class($day));
        $dayName = preg_replace('/(?<=\\w)(?=[A-Z])/', " $1", $dayName);

        echo "\n";
        printf("%s part 1 answer: %s", trim($dayName), $day->partOne());
        echo "\n";
        printf("%s part 2 answer: %s", trim($dayName), $day->partTwo());
        echo "\n";
    }
}

echo "\n====| Advent of Code  2020 |====\n";
showResults([
    new DayOne(),
    new DayTwo(),
    new DayThree(),
    new DayFour(),
]);
echo "\n";