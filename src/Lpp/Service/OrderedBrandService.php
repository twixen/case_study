<?php

namespace Lpp\Service;

class OrderedBrandService implements \Lpp\Service\BrandServiceInterface {

    /**
     * @var ItemServiceInterface
     */
    private $itemService;

    /**
     * Maps from collection name to the id for the item service.
     *
     * @var []
     */
    private $collectionNameToIdMapping = [
        "winter" => 1315475
    ];

    /**
     * @param ItemServiceInterface $itemService
     */
    public function __construct(ItemServiceInterface $itemService) {
        $this->itemService = $itemService;
        $this->itemService->setOrderFunction(function($collection) {
            foreach ($collection as $brand) {
                foreach ($brand->items as $item) {
                    uasort($item->prices, function ($a, $b) {
                        return $a->priceInEuro <=> $b->priceInEuro;
                    });
                }
            }
        });
    }

    /**
     * @param string $collectionName Name of the collection to search for.
     *
     * @return \Lpp\Entity\Brand[]
     */
    public function getBrandsForCollection($collectionName) {
        if (empty($this->collectionNameToIdMapping[$collectionName])) {
            throw new \InvalidArgumentException(sprintf('Provided collection name [%s] is not mapped.', $collectionName));
        }

        $collectionId = $this->collectionNameToIdMapping[$collectionName];
        $itemResults = $this->itemService->getResultForCollectionId($collectionId);
        return $itemResults;
    }

    /**
     * This is supposed to be used for testing purposes.
     * You should avoid replacing the item service at runtime.
     *
     * @param \Lpp\Service\ItemServiceInterface $itemService
     *
     * @return void
     */
    public function setItemService(ItemServiceInterface $itemService) {
        $this->itemService = $itemService;
    }

    public function getItemsForCollection($collectionName) {

    }

}
