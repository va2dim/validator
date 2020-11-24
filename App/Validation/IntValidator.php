<?php


namespace App\Validation;

class IntValidator extends AbstractValidator
{

    public function validate($value, $name = null): bool
    {
        if (is_string($value) && is_numeric($value) || is_bool($value)) {
            $value = (int)$value;
        }

        if (!filter_var($value, FILTER_VALIDATE_INT) && $value !== 0) {
            throw new \Exception($name. ' must be int', 422);
        }

        return true;
    }
}