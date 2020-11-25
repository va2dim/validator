<?php


namespace App\Validation;


class ValidatorFactory
{
    /**
     * @param array $validationRules
     * @return Validator
     */
    public static function makeValidator(array $validationRules): Validator
    {
        return new Validator($validationRules);
    }
}