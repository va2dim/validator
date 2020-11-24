<?php


namespace App\Validation;


class RequiredValidator extends AbstractValidator
{
    public function validate($value, $name): bool
    {
        if (!isset($value)) {
            throw new \Exception($name . ' field is required!', 422);
        }

        return true;
    }
}