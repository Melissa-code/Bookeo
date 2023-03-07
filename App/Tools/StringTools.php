<?php

namespace App\Tools;

class StringTools
{
    /**
     * Put a string to camel case & withdraw - or _ for the rows int he Db (ex: type_id)
     * @param $value
     * @param false $pascalCase
     * @return string
     */
    public static function toCamelCase($value, $pascalCase = false): string {
        $value = ucwords(str_replace(array('-', '_'), ' ', $value));
        $value = str_replace(' ', '', $value);
        if ($pascalCase === false) {
            return lcfirst($value);
        } else {
            return $value;
        }
    }

    /**
     * Put a string to Pascal case
     * @param $value
     * @return string
     */
    public static function toPascalCase($value): string {
        return self::toCamelCase($value, true);
    }
}