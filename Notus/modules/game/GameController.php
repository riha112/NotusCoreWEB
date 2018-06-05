<?php
namespace Notus\Modules\Game;

use Notus\Modules\Message\MessageController as MSG;
use Notus\Modules\Database\Database as DB;

class GameController
{

    public static function saveGame(array $data) {

    }

    public static function loadGame() {

    }

    public static function loadUserGames(int $userID): array {
        $database = DB::getDatabase();
        return $database->select("game", [
            "title",
            "game_file",
            "created",
            "modified",
            "status"
        ],[
            "user_id" => $userID
        ]);
    }

}
