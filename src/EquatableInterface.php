<?php


namespace Jkhaled\Equatable;


interface EquatableInterface
{

    /**
     * compare to object of same class
     *
     * @param $object
     * @return bool
     */
    public function equalTo(EquatableInterface $object): bool;

}