<?php
namespace Notus\App\Pages;

use Siler\{Dotenv, Http};
use Notus\Modules\User\Auth;
use Notus\Modules\Database\Database as DB;
use Notus\Modules\Token;
use Notus\Modules\Message\MessageController as MSG;
class ApiPage
{
    public static function _init() {
        if(self::canView()){
            self::API();
        }
    }

    protected static function canView() : bool{
        return isset($_GET["action"]) || isset($_POST["action"]);
    }

    protected static function API(array $data = []) : array {
        $action = $_GET['action'] ?? $_POST["action"];
        switch($action){
            case "activate_profile":
                self::activateProfile();
            break;
            case "login":
                //header('Content-Type: application/json');
                echo self::authentificateProfile();
                die();
            break;
            case "save_game":
            break;
            case "load_game":
            break;
            case "load_all_games":
                echo self::getUserGames();
                die();
            break;
        }
        return $data;
    }

    private static function activateProfile(){
        $key = $_GET['key'];
        $token = Token\Token::getTokenByKey($key);
        if(Token\Token::isTokenValid($token)){
            $status = $token['status'] ?? 2;
            if($status == 0){
                Auth::setUserAsRegistered($token["user_id"]);
                MSG::addSuccessMessage(["message" => "Registration completed."]);
            }else if($status == 1){
                MSG::addErrorMessage(["message" => "User already activated!"]);
            }else{
                MSG::addWarningMessage(["message" => "User BANED!"]);
            }
            Token\Token::removeToken($token["id"]);
        }else{
            MSG::addErrorMessage(["message" => "Unknown key!"]);
        }
        Http\redirect(Http\url());
    }

    private static function authentificateProfile(){
        if( Auth::Login($_POST) ){
            $userID= Auth::isAuthorized();
            $token = Token\Token::createTokken([
                "user_id" => $userID,
                "type" => 3,
            ], 356);
            return $token["hash_key"];
        }else{
            return "Wrong username or password";
        }
    }

    private static function getUserGames(){
        $token = $_POST["key"] ?? FALSE;
        if($token){
            $tokenData = Token\Token::getTokenByKey($token);
            if(Token\Token::isTokenValid($tokenData) && $tokenData["type_id"] == 3){
                return "Mygames";
            }
            throw new \Exception("Wrong token");
        }
        throw new \Exception("No token detected");        
    }

}
