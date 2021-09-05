<?php

namespace ArturDoruch\SecurityUtil\Tests;

use ArturDoruch\SecurityUtil\PasswordGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @author Artur Doruch <arturdoruch@interia.pl>
 */
class PasswordGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $password = PasswordGenerator::generate($length = 20);

        self::assertEquals(strlen($password), $length);
        self::assertRegExp('/[A-Z]/', $password);
        self::assertRegExp('/\d/', $password);
        self::assertRegExp('/^[a-z\d]+$/i', $password);
    }
}
