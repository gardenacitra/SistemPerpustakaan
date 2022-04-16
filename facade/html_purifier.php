<?php

/**
 * antiXss
 * 
 * A function to validate XSS factor within a string.
 * 
 * @param string $string_to_be_check
 *      String to be check
 * 
 * @return bool
 *      If this return true, then the string has XSS factor within.
 */
function antiXss(string $string_to_be_check): bool {
    foreach([
        '/',
        '<',
        '>',
        '"'
    ] as $needle){


        if(strpos($string_to_be_check, $needle)){
            return true;
        }
    }

    return false;
}