<?php
namespace App\Validation;

require_once 'autoload.php';

$form = new RegistrationForm();
//$form = new NameAgeForm();

if (!empty($_POST)) {
    $form->validate($_POST);
}

require $form->getTemplate();