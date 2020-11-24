<?php


namespace App\Validation;

/**
 * Trait CollectionTrait
 * @package App\Validation
 *
 * implements from CollectionInterface only add to Collection part
 */
trait CollectionTrait
{
    protected $__data = [];

    public function add($value)
    {
        $this->__data = array_merge($this->__data, [$value]);
        return $this;
    }


}