<?php

namespace ArturDoruch\SecurityUtil;

/**
 * @author Artur Doruch <arturdoruch@interia.pl>
 */
class CsrfTokenIdGenerator
{
    /**
     * @var string
     */
    private $secret;

    /**
     * @param string $secret
     */
    public function __construct($secret = '')
    {
        $this->secret = $secret;
    }

    /**
     * Generates CSRF token id by hashing the specified value.
     *
     * @param string $value The value to hash.
     * @param string $hashingAlgorithm
     *
     * @return string
     */
    public function generate($value, $hashingAlgorithm = 'md5')
    {
        return hash_hmac($hashingAlgorithm, $value, $this->secret);
    }
}
