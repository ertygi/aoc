<?php
namespace AoC;

class PuzzleInput
{
    protected static $sourceUrl = 'https://adventofcode.com';

    /**
     * @param string $day
     * @return false|string[]
     */
    public static function getData(string $day)
    {
        $source = self::$sourceUrl . '/2020/day/' . $day . '/input';
        // Create a stream
        $opts    = array(
            'http' => array(
                'method' => "GET",
                'header' => "accept-language: en-GB,en-US;q=0.9,en;q=0.8\r\n" .
                    "cookie: session=" . $_ENV['AOC_SESSION_ID'],

            ),
        );

        $context = stream_context_create($opts);
        $file    = file_get_contents($source, false, $context);
        $input   = explode(PHP_EOL, $file);

        return array_filter($input);
    }
}
