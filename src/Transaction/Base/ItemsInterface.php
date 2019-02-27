<?php

namespace Asx\Client\Transaction\Base;
use Asx\Client\Data\Item;

/**
 * Interface ItemsInterface
 *
 * @package Asx\Client\Transaction\Base
 */
interface ItemsInterface {

    /**
     * @param Item[] $items
     * @return void
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
