<?php

namespace Lpp\Entity;

/**
 * Represents a single item from a search result.
 *
 */
class Item {

    /**
     * Name of the item
     *
     * @var string
     */
    public $name;

    /**
     * Url of the item's page
     *
     * @var string
     */
    public $url;

    /**
     * Unsorted list of prices received from the
     * actual search query.
     *
     * @var Price[]
     */
    public $prices = [];

}
