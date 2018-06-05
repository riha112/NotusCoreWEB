<?php
namespace Notus\Modules\User;
use Notus\Modules\Database\Database as DB;
use \Exception as Exception;
use Notus\Modules\Message\MessageController as MSG;

class UserController
{
    public static function getUser(int $id) : User {
        return new User($id);
    }

    public static function getUserByUsername(string $username) : ?User {
        $id = 1; // TODO: Select from DB;
        $databas = DB::getDatabase();
        $result = $databas->select("user", ["id"], ["username" => $username, "status[!]" => 3]);
        if(\sizeof($result) > 0){
            return self::getUser($result[0]["id"]);
        }
        return NULL;
    }

    public static function userExists(string $username) : bool {
        $database = DB::getDatabase();
        $result = $database->count("user", ["username" => $username, "status[!]" => 3]);
        return $result > 0;
    }

    public static function emailExists(string $email) : bool {
        $database = DB::getDatabase();
        $result = $database->count("user", ["email" => $email]);
        return $result > 0;
    }

    public static function createUser(array $data) : ?User {
        try{
            if(!self::userExists($data["username"])){
                if(!self::emailExists($data["email"])){
                    $table = 'user';                    
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);                    
                    $columns = $data;
                    
                    $database = DB::getDatabase();
                    $database->insert($table, $columns);
                    return self::getUserByUsername($data["username"]);
                }else{
                throw new Exception("Email already registred in system");            
                }
            }else{
                throw new Exception("Username already registred in system");            
            }
        }catch(Exception $e){
            MSG::addErrorMessage(['message' => $e->getMessage()]);
            return NULL;
        }
    }

    public static function changeUserData(User $user, array $data) : void {
        
    }

    public static function banUser(User $user) : void {
        self::setUsersStatus($user, 2);
    }

    public static function unBanUser(User $user) : void {
        self::setUsersStatus($user, 1);
    }

    public static function isUserBanned(User $user) : bool {
        return self::getUserStatus($user) === 2;
    }

    public static function activateUser(User $user) : void {
        self::setUsersStatus($user, 1);
    }

    public static function isUserActive(User $user) : bool {
        return self::getUserStatus($user) === 1;
    }

    private static function getUserStatus(User $user) : void {

    }

    /**
     * 0 - registered, but not active,
     * 1 - registered, active
     * 2 - baned
     */
    private static function setUsersStatus(User $user, int $status) : void {

    }
}
