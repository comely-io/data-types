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

use Comely\DataTypes\Buffer\Base16;

/**
 * Class Strings
 * @package Comely\DataTypes
 */
class Strings
{
    /**
     * @param string $ascii
     * @return Base16
     */
    public static function asciiEncode(string $ascii): Base16
    {
        if (DataTypes::isUtf8($ascii)) {
            throw new \InvalidArgumentException('Cannot encode UTF-8 string into hexadecimals');
        }

        $hex = "";
        for ($i = 0; $i < strlen($ascii); $i++) {
            $hex .= dechex(ord($ascii[$i]));
        }

        return new Base16($hex);
    }

    /**
     * @param Base16 $hex
     * @return string
     */
    public static function asciiDecode(Base16 $hex): string
    {
        $hex = $hex->hexits();
        $str = "";
        for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
            $str .= chr(hexdec($hex[$i] . $hex[$i + 1]));
        }

        return $str;
    }
}