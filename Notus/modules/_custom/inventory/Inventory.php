<?php
namespace Notus\Custom\Inventory;

use Notus\Modules\Message\MessageController as MSG;

class Inventory
{
    private $items = [];
    private $uid;

    private function _init($uid) : void {
        $this->$uid = $uid;
        $rawItems = $this->_getItemListFromDB();
        $this->_populateItemsFromArray($rawItems);
    }

    private function _getItemListFromDB() : array {
        try {
            global $database;
        } catch(Exception $e) {
            MSG::addErrorMessage([
                "message" => $e->getMessage()
            ]);
        }
        return [];
    }

    private function _populateItemsFromArray($array) : void {
        foreach ( $array as $itemID => $rawItemData ) {
            $data = array_merge( $rawItemData, [
                "uid" => $this->uid
            ]);
            $this->items[$itemID] = new \InventoryItem( $data );
        }
    }

    public function getItems() : array {
        return $this->items;
    }

    public function getItem(int $itemID) : ?InventoryItem {
        if( $this->hasItem($itemID) ){
            return $this->items[$itemID];
        }
        return NULL;
    }

    public function hasItem(int $itemID) : bool {
        return isset($this->items[$itemID]) && \sizeof( $this->items[$itemID]->getCount() ) > 0;
    }

    public function getItemCount(int $itemID) : int {
        return ( $this->hasItem($itemID) ) ? $this->items[$itemID]->getCount() : 0;
    }

    public function addItem(int $itemID, int $amount) : void {
        if( isset($items[$itemID]) ){
            // TODO update items
        } else {
            // TODO add new items
        }
    }

    public function removeItem(int $itemID, int $amount) : void {
        $itemCount = $this->getItemCount($itemID);
        if( $itemCount - $amount < 0 ){
            throw new Exception("Excedes");
        }
        // TODO remove items
    }

    public function giveItemToOtherUser(int $userID, int $itemsID, int $amount) : void{
        $itemCount = $this->getItemCount($itemID);
        $itemDifference = $itemCount - $amount < 0;
        if( $itemDifference < 0 ){
            throw new Exception("Excedes");        
        } else {
            // TODO remove items
            // TODO give items
            // TODO check if left any ? update count : remove
        } 
    }
}
