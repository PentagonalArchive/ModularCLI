<?php
declare(strict_types=1);

namespace Pentagonal\ModularCLI\Source;

/**
 * Class Config
 * @package Pentagonal\ModularCLI\Source
 */
class Config implements \ArrayAccess, \Countable, \Serializable, \IteratorAggregate, \JsonSerializable
{
    /**
     * Config constructor.
     *
     * @param array $input
     */
    public function __construct(array $input = [])
    {
        foreach ($input as $key => &$value) {
            if (is_array($value)) {
                $value = new Config($value);
            }
            $this->{$key} = $value;
        }
    }

    /**
     * @param mixed $offset
     */
    public function remove($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->{$offset});
        }
    }

    /**
     * @param array $values
     */
    public function replace(array $values)
    {
        foreach ($values as $key => &$value) {
            $this->set($key, $value);
        }
    }

    /**
     * @param mixed $index
     *
     * @return bool
     */
    public function exist($index) : bool
    {
        return array_key_exists($index, $this->getObjectVars());
    }

    /**
     * @param mixed $index
     * @param mixed $default
     *
     * @return mixed|null|Config|Config[]
     */
    public function &get($index, $default = null)
    {
        if ($this->exist($index)) {
            $array = $this->{$index};
            if (is_array($array)) {
                $array = new Config($array);
            }

            return $array;
        }

        return $default;
    }

    /**
     * @param mixed $index
     * @param mixed $value
     */
    public function set($index, $value)
    {
        if (is_array($value)) {
            $value = new Config($value);
        }

        $this->{$index} = $value;
    }

    /**
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists($offset) : bool
    {
        return $this->exist($offset);
    }

    /**
     * @param mixed $index
     *
     * @return mixed|Config
     */
    public function &offsetGet($index)
    {
        return $this->get($index);
    }

    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }

    public function offsetSet($index, $value)
    {
        $this->set($index, $value);
    }

    /**
     * @return array
     */
    public function getObjectVars() : array
    {
        return call_user_func('get_object_vars', $this);
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        $array = [];
        foreach ($this->getObjectVars() as $key => &$value) {
            if ($value instanceof Config) {
                $value = $value->toArray();
            }
            $array[$key] =& $value;
        }

        return $array;
    }

    /**
     * @return int
     */
    public function count() : int
    {
        return count($this->getObjectVars());
    }

    /**
     * @return string
     */
    public function serialize() : string
    {
        return serialize($this->toArray());
    }

    /**
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        $serialized = (array) @unserialize($serialized);
        $this->replace($serialized);
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator() : \ArrayIterator
    {
        return new \ArrayIterator($this->getObjectVars());
    }

    /**
     * @param mixed $name
     *
     * @return bool
     */
    public function __isset($name) : bool
    {
        return $this->offsetExists($name);
    }

    /**
     * @param mixed $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->offsetSet($name, $value);
    }

    /**
     * @param mixed $name
     */
    public function __unset($name)
    {
        $this->offsetUnset($name);
    }

    /**
     * @param mixed $name
     *
     * @return mixed|Config|Config[]
     */
    public function &__get($name)
    {
        return $this->offsetGet($name);
    }
}
