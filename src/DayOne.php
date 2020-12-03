<?php

namespace AoC;

use AoC\PuzzleInput;

class DayOne implements DaysOfAdventInterface
{
    /**
     * @return int
     */
    public function partOne():int
    {
        $expenseRecords = PuzzleInput::getData(1);
        sort($expenseRecords);
        $complements = [];
        foreach ($expenseRecords as $key => $record) {
            if (!in_array($record, $complements)) {
                unset($expenseRecords[$key]);
                $complements[] = 2020 - $record;
                continue;
            }
            $complement = 2020 - $record;
            return $complement * $record;
        }

        return 0;
    }

    /**
     * @return int
     */
    public function partTwo(): int
    {
        $expenseRecords = PuzzleInput::getData(1);
        sort($expenseRecords);
        $complements = [];
        foreach ($expenseRecords as $key => $record) {
            if (!in_array($record, $complements)) {
                unset($expenseRecords[$key]);
                $restOfExpenseRecords = $expenseRecords;
                foreach ($restOfExpenseRecords as $keyTwo => $recordTwo) {
                    if (!in_array($recordTwo, $complements)) {
                        $complements[] = 2020 - ($record + $recordTwo);
                        unset($restOfExpenseRecords[$keyTwo]);
                        continue;
                    }
                    $complement = 2020 - ($record + $recordTwo);
                    return $complement * $record * $recordTwo;
                }
                continue;
            }

        }

        return 0;
    }
}

