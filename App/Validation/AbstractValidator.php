<?php


namespace App\Validation;

/**
 * Class AbstractValidator
 * @package App\Validation
 */
abstract class AbstractValidator
{
    abstract public function validate($value, $name): bool;

    public function __invoke($value): bool
    {
        return $this->validate($value);
    }
}