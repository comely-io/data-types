<?php
/**
 * This file is a part of "comely-io/data-types" package.
 * https://github.com/comely-io/data-types
 *
 * Copyright (c) Furqan A. Siddiqui <hello@furqansiddiqui.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code or visit following link:
 * https://github.com/comely-io/data-types/blob/master/LICENSE
 */

declare(strict_types=1);

namespace Comely\DataTypes;

/**
 * Class Time
 * @package Comely\DataTypes\Static
 */
class Time
{
    /**
     * @param int $stamp1
     * @param int|null $stamp2
     * @return int
     */
    public static function difference(int $stamp1, int $stamp2 = null): int
    {
        if (!is_int($stamp2)) {
            $stamp2 = time();
        }

        return $stamp2 > $stamp1 ? $stamp2 - $stamp1 : $stamp1 - $stamp2;
    }

    /**
     * Number of minutes elapsed (decimal with 1 digit) between 2 timestamps
     *
     * @param int $stamp1
     * @param int|null $stamp2
     * @return float
     */
    public static function minutesDifference(int $stamp1, int $stamp2 = null): float
    {
        return round(self::difference($stamp1, $stamp2) / 60, 1);
    }

    /**
     * Number of hours elapsed (decimal with 1 digit) between 2 timestamps
     *
     * @param int $stamp1
     * @param int|null $stamp2
     * @return float
     */
    public static function hoursDifference(int $stamp1, int $stamp2 = null): float
    {
        return round((self::difference($stamp1, $stamp2) / 60) / 60, 1);
    }

    /**
     * @param string $units
     * @return int
     */
    public static function unitsToSeconds(string $units): int
    {
        // Remove all whitespaces
        $units = preg_replace("/\s/", "", $units);

        $seconds = 0;
        $matches = [];
        preg_match_all("/[1-9]+[0-9]*[dhms]/", $units, $matches);
        $matches = $matches[0] ?? null;
        if (is_array($matches)) {
            // Grab all matches
            $units = [
                "s" => 1,
                "m" => 60,
                "h" => 3600,
                "d" => 86400
            ];

            foreach ($matches as $match) {
                $int = intval(substr($match, 0, -1));
                $unit = substr($match, -1);
                if (array_key_exists($unit, $units)) {
                    $seconds += $int * $units[$unit];
                }
            }
        }

        return $seconds;
    }
}