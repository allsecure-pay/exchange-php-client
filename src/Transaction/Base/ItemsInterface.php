<?php

namespace Exchange\Client\Transaction\Base;
use Exchange\Client\Data\Item;

/**
 * Interface ItemsInterface
 *
 * @package Exchange\Client\Transaction\Base
 */
interface ItemsInterface {

    /**
     * @param Item[] $items
     */
    public function setItems($items);

    /**
     * @return Item[]
     */
    public function getItems();

    /**
     * @param Item $item
     * @return void
     */
    public function addItem($item);

}