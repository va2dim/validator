<?php

/** @var \App\Validation\Validator $validator **/
    if (isset($validator)) {
        $validationErrors = $validator->getValidationErrors();
        foreach ($validationErrors->getMessages() as $msg) {
            echo $msg .'<br>';
        }
    }
