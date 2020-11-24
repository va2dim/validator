<?php

namespace App\Validation;

class MultiException extends \Exception
{
    use CollectionTrait;

    /**
     * Returns array of all validation messages
     * @return array
     */
    public function getMessages(): array
    {
        $result = [];
        foreach (array_keys($this->__data) as $key) {
            $result[$key] = $this->__data[$key]->message;
        }

        return $result;
    }

}