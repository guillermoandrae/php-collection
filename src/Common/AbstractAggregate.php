<?php

namespace Guillermoandrae\Common;

use ArrayIterator;

abstract class AbstractAggregate implements AggregateInterface
{
    use DumpableTrait;

    /**
     * The items used to build the object.
     *
     * @var array
     */
    protected $items;

    /**
     * Builds the Collection object.
     *
     * @param array $items  The array of items used to build the aggregate.
     */
    final public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    final public function has($key): bool
    {
        return $this->offsetExists($key);
    }

    final public function get($key, $default = null)
    {
        if ($this->offsetExists($key)) {
            return $this->items[$key];
        }
        return $default;
    }

    final public function set($key, $value)
    {
        $this->offsetSet($key, $value);
    }

    public function remove($key)
    {
        $this->offsetUnset($key);
    }

    final public function offsetExists($key)
    {
        return array_key_exists($key, $this->items);
    }

    final public function offsetGet($key)
    {
        return $this->items[$key];
    }

    final public function offsetSet($key, $value)
    {
        $this->items[$key] = $value;
    }

    final public function offsetUnset($key)
    {
        unset($this->items[$key]);
    }

    final public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }
}
