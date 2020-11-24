<?php


namespace App\Validation;


class PasswordValidator extends AbstractValidator
{

    public function validate($value, $name): bool
    {
        $isMatch = preg_match('/^(?=\S{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)\S*$/', $value);

        if (!$isMatch) {
            throw new \Exception($name. ' must contain at least 1 digit, 1 uppercase character & 1 lowercase characters & 1 special character & length must be more than 8', 422);
        }

        return true;
    }
}