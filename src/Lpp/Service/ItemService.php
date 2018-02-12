<?php

namespace Lpp\Service;

use \Lpp\Entity\Brand;
use \Lpp\Entity\Item;
use \Lpp\Entity\Price;
use \Lpp\Service\Validator;
use \Closure;

class ItemService implements ItemServiceInterface {

    private $_collection = [];
    private $_validator = null;
    private $_sort_function = null;

    public function __construct() {
        $this->_validator = new Validator();
    }

    public function getResultForCollectionId(int $collectionId): array {
        if (!array_key_exists($collectionId, $this->_collection)) {
            $this->_collection[$collectionId] = $this->jsonToObject($this->getJsonCollection($collectionId));
        }
        if ($this->_sort_function instanceof Closure) {
            ($this->_sort_function)($this->_collection[$collectionId]);
        }
        return $this->_collection[$collectionId];
    }

    public function setOrderFunction(Closure $function) {
        $this->_sort_function = $function;
    }

    private function getJsonCollection(int $collectionId): object {
        $path = DATA_SRC . DIRECTORY_SEPARATOR . $collectionId . '.json';
        if (file_exists($path)) {
            return json_decode(file_get_contents($path));
        } else {
            throw new \InvalidArgumentException(sprintf('collection %s not exist', $collectionId));
        }
    }

    private function jsonToObject(object $json): array {
        $collection = [];
        foreach ($json->brands as $brand_key => $brand) {
            $new_brand = new Brand();
            $new_brand->brand = $brand->name;
            $new_brand->description = $brand->description;
            $collection[$brand_key] = $new_brand;
            foreach ($brand->items as $item_key => $item) {
                $new_item = new Item();
                $new_item->name = $item->name;
                $new_item->url = $this->_validator->checkUrl($item->url);
                $collection[$brand_key]->items[$item_key] = $new_item;
                foreach ($item->prices as $price_key => $price) {
                    $new_price = new Price();
                    $new_price->description = $price->description;
                    $new_price->priceInEuro = $price->priceInEuro;
                    $new_price->arrivalDate = $price->arrival;
                    $new_price->dueDate = $price->due;
                    $collection[$brand_key]->items[$item_key]->prices[$price_key] = $new_price;
                }
            }
        }
        return $collection;
    }

}
