<?php

namespace Lpp\Service;

/**
 * The implementation is responsible for resolving the id of the collection from the
 * given collection name.
 *
 * Second responsibility is to sort the returning result from the item service in whatever way. 
 * 
 * Please write in the case study's summary if you find this approach correct or not. In both cases explain why.
 *
 */
interface BrandServiceInterface
{
     /**
     * @param string $collectionName Name of a collection to search for
     *
     * @return \Lpp\Entity\Item[]
     */
    public function getItemsForCollection($collectionName);

    /**
     * This is supposed to be used for testing purposes.
     * You should avoid replacing the item service at runtime.
     *
     * @param \Lpp\Service\ItemServiceInterface $itemService
     *
     * @return void
     */
    public function setItemService(ItemServiceInterface $ItemService);
}
