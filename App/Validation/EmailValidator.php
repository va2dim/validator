<?php


namespace App\Validation;


class EmailValidator extends AbstractValidator
{

    public function validate($value, $name): bool
    {
        // According RFC 822, but domain name without . not supported
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception($name. ' not correct (must contain 1 symbol @ and at least 1 .)' , 422);
        }

        return true;
    }
}