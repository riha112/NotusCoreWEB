<?php
namespace Notus\Modules\Token;
use Notus\Modules\Database\Database as DB;

class Token
{
    public static function getTokenByKey($key) {
        $database = DB::getDatabase();
        $token =  $database->select("token", [
            "[>]user" => ["user_id" => "id"],
            "[>]token_type" => ["type" => "id"]
        ],[
            "token.id",
            "token.hash_key",
            "user.username",
            "user.status",
            "user.id(user_id)",
            "token.user_id",
            "token.created",
            "token.expiration_date",
            "token.ip_address",
            "token.type(type_id)",
            "token_type.title"
        ], [
            "token.hash_key" => $key
        ]);

        if(\sizeof($token) > 0){
            return $token[0];
        }
        return FALSE;
    }

    public static function removeToken($id) {
        $database = DB::getDatabase();
        $database->delete("token", ["id" => $id]);
    }

    public static function isTokenValid(array $tokentData) : bool{
        $currentTimeStamp = time();
        $exp_date = strtotime($tokentData['expiration_date']);
        return $currentTimeStamp < $exp_date;
    }

    public static function createTokken(array $data, int $days = 1){
        $data["hash_key"] = bin2hex(random_bytes(32));
        $data["ip_address"] = $_SERVER['REMOTE_ADDR'];
        if(!isset($data['expiration_date'])){
            $timestamp = time() + 24 * 60 * 60 * $days;// 1DAY
            $data['expiration_date']  = date("Y-m-d H:i:s", $timestamp);
        }
        if(!isset($data["user_id"]) || !isset($data["type"])) 
            return FALSE;
        $database = DB::getDatabase();
        $database->insert("token", $data);
        return $data;
    }
}
