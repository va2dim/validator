<?php
namespace App\Validation;

require_once 'autoload.php';

$form = new RegistrationForm();
//$form = new NameAgeForm();

if (!empty($_POST)) {
    $validator = ValidatorFactory::makeValidator($form->getValidationRules());
    $validator->validate($_POST);
}

require $form->getTemplate();