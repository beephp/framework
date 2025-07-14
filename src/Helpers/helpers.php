<?php

use Dotenv\Dotenv;


if (!function_exists('env')) {
    /**
     * Get the value of an environment variable or return a default value.
     *
     * @param string $key The name of the environment variable.
     * @param mixed $default The default value to return if the variable is not set.
     * @return mixed
     */
    function env($key, $default = null)
    {
        return getenv($key) !== false ? getenv($key) : $default;
    }
}