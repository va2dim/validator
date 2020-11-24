<?php

    $validationErrors = $form->getValidationErrors();
    if (isset($validationErrors)) {
        foreach ($validationErrors->getMessages() as $msg) {
            echo $msg .'<br>';
        }
    }
