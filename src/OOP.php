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
 * Class OOP
 * @package Comely\DataTypes
 */
class OOP
{
    /**
     * @param $val
     * @return bool
     */
    public static function isValidClass($val): bool
    {
        return self::isValidClassName($val) && class_exists($val) ? true : false;
    }

    /**
     * @param $val
     * @return bool
     */
    public static function isValidClassName($val): bool
    {
        if (is_string($val) && preg_match('/^\w+(\\\\\w+)*$/', $val)) {
            return true;
        }

        return false;
    }

    /**
     * Return base/short class name
     * @param string $class
     * @return string
     */
    public static function baseClassName(string $class): string
    {
        $lastOccurrence = strrchr($class, "\\");
        if (!$lastOccurrence) {
            return $class;
        }

        return substr($lastOccurrence, 1);
    }

    /**
     * Converts given string (i.e. snake_case) to PascalCase
     * @param string $name
     * @return string
     */
    public static function PascalCase(string $name): string
    {
        // Return an empty String if input is an empty String
        if (empty($name)) {
            return "";
        }

        $words = preg_split("/[^a-zA-Z0-9]+/", strtolower($name), 0, PREG_SPLIT_NO_EMPTY);
        return implode("", array_map(function ($word) {
            return ucfirst($word);
        }, $words));
    }

    /**
     * Converts given string (i.e. snake_case) to camelCase
     * @param string $name
     * @return string
     */
    public static function camelCase(string $name): string
    {
        // Return an empty String if input is an empty String
        if (empty($name)) {
            return "";
        }

        // Convert to PascalCase first and then convert PascalCase to camelCase
        $pascal = self::pascalCase($name);
        return sprintf("%s%s", strtolower($pascal[0]), substr($pascal, 1));
    }

    /**
     * Converts given string (i.e. PascalCase or camelCase) to snake_case
     * @param string $name
     * @return string
     */
    public static function snake_case(string $name): string
    {
        // Return an empty String if input is an empty String
        if (empty($name)) {
            return "";
        }

        // Convert PascalCase word to camelCase
        $name = sprintf("%s%s", strtolower($name[0]), substr($name, 1));

        // Split words
        $words = preg_split("/([A-Z0-9]+)/", $name, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $wordsCount = count($words);
        $snake = $words[0];

        // Iterate through words
        for ($i = 1; $i < $wordsCount; $i++) {
            if ($i % 2 != 0) {
                // Add an underscore on an odd $i
                $snake .= "_";
            }

            // Add word to snake
            $snake .= $words[$i];
        }

        // Return lowercase snake
        return strtolower($snake);
    }
}