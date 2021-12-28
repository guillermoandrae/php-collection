<?php

use Guillermoandrae\Common\Collection;

if (!function_exists('collect')) {
    function collect(array $items = []): \Guillermoandrae\Common\CollectionInterface
    {
        return new Collection($items);
    }
}
