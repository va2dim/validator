<?php

use App\Validation\IntValidator;
use PHPUnit\Framework\TestCase;

class IntValidatorTest extends TestCase
{
    public function testBooleanTrue()
    {
        $validator = new IntValidator();
        $result = $validator(true);
    }
}
