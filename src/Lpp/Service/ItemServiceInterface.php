<?php

namespace Lpp\Service;

/**
 * Represents the connection to a specific item store.
 * For the case study we will pretend we have only one item store to make things easier.
 *
 */
interface ItemServiceInterface {

    /**
     * This method should read from a datasource (JSON for case study)
     * and should return an unsorted list of brands found in the datasource.
     *
     * @param int $collectionId
     *
     * @return Lpp\Entity\Brand[]
     */
    public function getResultForCollectionId($collectionId);

    public function setOrderFunction($function);
}
