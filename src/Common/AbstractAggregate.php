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

    /**
     * {@inheritDoc}
     */
    final public function has($key): bool
    {
        return $this->offsetExists($key);
    }

    /**
     * {@inheritDoc}
     */
    final public function get($key, $default = null)
    {
        if ($this->offsetExists($key)) {
            return $this->items[$key];
        }
        return $default;
    }

     /**
     * {@inheritDoc}
     */ 
    final public function set($key, $value)
    {
        $this->offsetSet($key, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function remove($key)
    {
        $this->offsetUnset($key);
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetExists($key)
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetGet($key)
    {
        return $this->items[$key];
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetSet($key, $value)
    {
        $this->items[$key] = $value;
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetUnset($key)
    {
        unset($this->items[$key]);
    }

    /**
     * {@inheritDoc}
     */
    final public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }
}
