<?php
namespace Notus\Modules\Game;

use Notus\Modules\Message\MessageController as MSG;
use Notus\Modules\Database\Database as DB;

class GameController
{

    public static function saveGame(array $data) {
        $database = DB::getDatabase();
        $database->insert("game", $data);
        return $database->id();
    }

    public static function updateGame(int $gameID, string $saveData) {
        $database = DB::getDatabase();
        $database->update("game", [
            "save_data" => $saveData
        ],[
            "id" => $gameID
        ]);
    }

    public static function loadGame(int $gameID): array {
        $database = DB::getDatabase();
        $game = $database->select("game", [
            "id",
            "title",
            "save_data",
            "created",
            "modified",
            "status",
            "user_id"
        ],[
            "id" => $gameID
        ]);
        if(\sizeof($game) > 0){
            return $game[0];
        }
        return null;
    }

    public static function loadUserGames(int $userID): array {
        $database = DB::getDatabase();
        return $database->select("game", [
            "id",
            "title",
            "save_data",
            "created",
            "modified",
            "status"
        ],[
            "user_id" => $userID
        ]);
    }

}
