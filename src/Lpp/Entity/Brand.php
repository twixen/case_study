<?php
namespace Lpp\Entity;

/**
 * Represents a single brand in the result.
 *
 */
class Brand
{
    /**
     * Name of the brand
     *
     * @var string
     */
    public $brand;

    /**
     * Brand's description
     * 
     * @var string
     */
    public $description;

    /**
     * Unsorted list of items with their corresponding prices.
     * 
     * @var Item[]
     */
    public $items = [];
}
