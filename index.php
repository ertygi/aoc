<?php

require __DIR__ . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use AoC\DayOne;
use AoC\DayTwo;
use AoC\DayThree;

$dayOne = new DayOne();
printf("Day 1 part 1 answer: %s", $dayOne->partOne());
echo "\n";
printf("Day 1 part 2 answer: %s", $dayOne->partTwo());
echo "\n";
echo "\n";
$dayTwp = new DayTwo();
printf("Day 2 part 1 answer: %s", $dayTwp->partOne());
echo "\n";
printf("Day 2 part 2 answer: %s", $dayTwp->partTwo());
echo "\n";
echo "\n";
$dayThree = new DayThree();
printf("Day 3 part 1 answer: %s", $dayThree->partOne());
echo "\n";
printf("Day 3 part 2 answer: %s", $dayThree->partTwo());
echo "\n";
echo "\n";