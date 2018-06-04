<?php

namespace Guillermoandrae\Common;

final class Collection extends AbstractAggregate implements CollectionInterface
{
    public static function make(array $items = []): CollectionInterface
    {
        return new static($items);
    }

    public function all(): array
    {
        return $this->items;
    }

    public function first()
    {
        return $this->items[0];
    }

    public function last()
    {
        $array = array_reverse($this->items);
        return $array[0];
    }

    public function random()
    {
        $key = array_rand($this->items);
        return $this->get($key);
    }

    public function sortBy(string $fieldName): CollectionInterface
    {
        $results = $this->items;
        usort($results, function ($item1, $item2) use ($fieldName) {
            return $item1[$fieldName] <=> $item2[$fieldName];
        });
        return new static($results);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    public function shuffle(): CollectionInterface
    {
        $items = $this->items;
        shuffle($items);
        return new static($items);
    }

    public function limit(int $offset = 0, int $limit = null): CollectionInterface
    {
        return new static(array_slice($this->items, $offset, $limit));
    }

    public function filter(callable $callback): CollectionInterface
    {
        return new static(array_filter($this->items, $callback));
    }

    public function map(callable $callback): CollectionInterface
    {
        return new static(array_map($callback, $this->items));
    }

    public function toArray(): array
    {
        return array_map(function ($value) {
            return $value instanceof ArrayableInterface ? $value->toArray() : $value;
        }, $this->items);
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function __toString(): string
    {
        return $this->toJson();
    }
}
