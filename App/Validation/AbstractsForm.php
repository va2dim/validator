<?php


namespace App\Validation;


abstract class AbstractsForm
{
    public static $validationRules = [];

    public function getValidationRules () {
        return static::$validationRules;
    }

    public function getShortClassName() {
        $array = explode('\\', get_called_class());
        return $array[count($array) - 1];
    }

    public function getTemplate () {
        return __DIR__ . '/../Forms/' . $this->getShortClassName() . '.template.php';
    }
}