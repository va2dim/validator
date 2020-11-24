<?php


namespace App\Validation;


class MinValidator extends AbstractValidator
{
    protected $__limit = 0;

    public function setLimit($limit) {
        $this->__limit = $limit;
    }

    public function validate($value, $name): bool
    {

        if (strlen($value) < $this->__limit) {
            throw new \Exception($name. ' Length must be more than ' . $this->__limit , 422);
        }

        return true;
    }
}