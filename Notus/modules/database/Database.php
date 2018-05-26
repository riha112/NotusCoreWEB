<?php
namespace Notus\Modules\Database;
use Notus\Modules\Message\MessageController as MSG;

class Database
{
    public static function getDatabase() {
        try {
            global $database;
            return $database;
        } catch(Exception $e) {
            MSG::addErrorMessage(["message" => $e->getMessage()]);
            return self::__initDatabase();
        }
    }

    private static function __initDatabase() {
        // TODO: Return new Medoo DB
        return NULL;
    }
}