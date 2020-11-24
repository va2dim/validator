<?php


namespace App\Validation;


class AlphaValidator extends AbstractValidator
{

    public function validate($value, $name): bool
    {
        if (!ctype_alpha($value)) {
            throw new \Exception($name. ' Not all symbol a alpha', 422);
        }

        return true;
    }
}