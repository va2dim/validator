<?php


namespace App\Validation;


class NameAgeForm extends AbstractsForm
{
    public static $validationRules = [
        'name' => 'alpha|min:2|max:4|required',
        'age' => 'int|required',
    ];
}