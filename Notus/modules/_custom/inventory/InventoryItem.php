<?php
namespace Notus\Custom\Inventory;

use Notus\Modules\Message\MessageController as MSG;

class InventoryItem extends Item
{
    private $userID, $count;

    public function getCount() : int {
        return $this->count;
    }

    public function save() : void {
        if( $hasChanged ) {
            $this->_saveChangesToDB();
        }
    }

    private function _saveChangesToDB() : void {
        try {
            global $database;
        } catch(Exception $e) {
            MSG::addErrorMessage([
                "message" => $e->getMessage()
            ]);
        }
    }


}