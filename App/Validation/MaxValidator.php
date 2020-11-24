<?php


namespace App\Validation;


class MaxValidator extends AbstractValidator
{
    protected $__limit = 0;

    public function setLimit($limit) {
        $this->__limit = $limit;
    }

    public function validate($value, $name): bool
    {

        if (strlen($value) > $this->__limit) {
            throw new \Exception($name. ' Length must be less than ' . $this->__limit , 422);
        }

        return true;
    }
}