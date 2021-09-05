<?php

namespace ArturDoruch\SecurityUtil;

/**
 * @author Artur Doruch <arturdoruch@interia.pl>
 */
class PasswordGenerator
{
    /**
     * Generates password with at least one uppercase letter and one digit.
     *
     * @param int $length
     * @param bool $requiredUppercaseLetter
     * @param bool $requiredDigit
     *
     * @return string
     */
    public static function generate($length, $requiredUppercaseLetter = true, $requiredDigit = true)
    {
        if (4 > $length = (int) $length) {
            throw new \InvalidArgumentException('The $length argument must be greater than or equal 4.');
        }

        $password = base64_encode(random_bytes($length));
        $password = substr(preg_replace('/[^a-zA-Z\d]/', '', $password), 0, $length);

        if ($requiredDigit && !preg_match('/\d/', $password)) {
            $password[rand(0, $length-1)] = rand(0, 9);
        }

        if ($requiredUppercaseLetter && !preg_match('/[A-Z]/', $password)) {
            $password = preg_replace_callback('/([a-z])/', function ($matches) {
                return strtoupper($matches[1]);
            }, $password, 1);
        }

        return $password;
    }
}
