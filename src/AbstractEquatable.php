<?php


namespace Jk\Equatable;


abstract class AbstractEquatable implements EquatableInterface
{
    abstract public function getProperties(): array;

    /**
     * @param $object
     * @return bool
     * @throws PropertyNotExistException
     */
    public function equalTo(EquatableInterface $object): bool
    {
        if (!$object instanceof static) {
            throw new BadClassException(sprintf('object must be instance of same class'));
        }
        $props = $this->getProperties();
        foreach ($props as $prop) {
            if (!property_exists($this, $prop)) {
                throw new PropertyNotExistException(sprintf('property %s not exist', $prop));
            }
            $getPropertyValue = function ($o, $property) {
                return $o->$property;
            };
            $propOfObject = \Closure::bind($getPropertyValue, null, $object);
            $propOfCurrent = \Closure::bind($getPropertyValue, null, $this);
            if ($propOfCurrent($this, $prop) !== $propOfObject($object, $prop)) {
                return false;
            }
        }
        return true;
    }
}