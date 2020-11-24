<?php


namespace App\Validation;


class RegistrationForm extends AbstractsForm
{
    public static $validationRules = [
        'email' => 'email|required',
        'password' => 'password|required'
    ];
}