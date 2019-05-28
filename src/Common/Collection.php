<?php

namespace Guillermoandrae\Common;

final class Collection extends AbstractAggregate implements CollectionInterface
{
    /**
     * {@inheritDoc}
     */
    public static function make(array $items = []): CollectionInterface
    {
        return new static($items);
    }

    /**
     * {@inheritDoc}
     */
    public function all(): array
    {
        return $this->items;
    }

    /**
     * {@inheritDoc}
     */
    public function first()
    {
        return $this->items[0];
    }

    /**
     * {@inheritDoc}
     */
    public function last()
    {
        $array = array_reverse($this->items);
        return $array[0];
    }

    /**
     * {@inheritDoc}
     */
    public function random()
    {
        $key = array_rand($this->items);
        return $this->get($key);
    }

    /**
     * {@inheritDoc}
     */
    public function sortBy(string $fieldName, bool $reverse = false): CollectionInterface
    {
        $results = $this->items;
        usort($results, function ($item1, $item2) use ($fieldName) {
            return $item1[$fieldName] <=> $item2[$fieldName];
        });
        if ($reverse) {
            krsort($results);
        }
        return new static($results);
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * {@inheritDoc}
     */
    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    /**
     * {@inheritDoc}
     */
    public function shuffle(): CollectionInterface
    {
        $items = $this->items;
        shuffle($items);
        return new static($items);
    }

    /**
     * {@inheritDoc}
     */
    public function limit(int $offset = 0, int $limit = null): CollectionInterface
    {
        return new static(array_slice($this->items, $offset, $limit));
    }

    /**
     * {@inheritDoc}
     */
    public function filter(callable $callback): CollectionInterface
    {
        return new static(array_filter($this->items, $callback));
    }

    /**
     * {@inheritDoc}
     */
    public function map(callable $callback): CollectionInterface
    {
        return new static(array_map($callback, $this->items));
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return array_map(function ($value) {
            return $value instanceof ArrayableInterface ? $value->toArray() : $value;
        }, $this->items);
    }

    /**
     * {@inheritDoc}
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
