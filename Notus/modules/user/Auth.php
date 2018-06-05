<?php
namespace Notus\Modules\User;
use Notus\Modules\Message\MessageController as MSG;
use Notus\Modules\Database\Database as DB;
use Notus\Modules\Token\Token;
use \Exception as Exception;
class Auth
{
    public static function login(array $data) : bool {
        try{
            $user_data = self::getUserData($data['username']);
            if($user_data["status"] == 0){
                throw new Exception('Acctivate your profile. Check your email address for activation link.');
            } elseif($user_data["status"] == 2) {
                throw new Exception('Your profile has been BANED');
            } elseif($user_data["status"] == 3){
                throw new Exception('Wrong username or/and password');
            } else{
                if(self::canLogin($data, $user_data)){
                    if(!isset($_SESSION)) {
                        session_start();
                    }
                    $_SESSION['auth'] = $user_data["id"];
                    return TRUE;
                }else{
                    throw new Exception('Wrong username or/and password');
                }
            }
        }catch(Exception $e){
            MSG::addErrorMessage(['message' => $e->getMessage()]);
        }
        return FALSE;
    }
    public static function canLogin(array $data, array $user_data) : bool {
        // TODO: Validate login data
        //return $user_data['password'] == $data['password'];
        return password_verify($data['password'],$user_data['password']);
    }

    private static function getUserData(string $username) : ?array {
        global $database;
        $data = $database->select('user', [ 'username', 'password', 'id', "status" ], [ 'username' => $username, "status[!]" => 3 ]);
        if(!empty($data) && \is_array($data)){
            $user_data = $data[0];
            return $user_data;
        }
        throw new Exception('Wrong username or/and password');
    }

    public static function register($data) : bool {
        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        $is_developer = $data['is_developer'] ?? 0;     
        
        if($is_developer == 'on'){
            $is_developer = 1;
        }else if($is_developer == 'off'){
            $is_developer = 0;
        }
        
        $user = UserController::createUser([
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'is_developer' => $is_developer,
            'status' => 0,
        ]);

        $success = $user != NULL;
        if($success){
            //Make tokken
            $tokrnData = [
                "user_id" => $user->getID(),
                "type" => 1,
            ];
            $token = Token::createTokken($tokrnData, 999);

            //Send mail;
        }

        return $success;

    }

    public static function logout() : void {
        if(!isset($_SESSION)) {
            session_start();
        }
        session_unset();
        session_destroy();
    }

    private static function sendAuthorizationMessage($who) : void {
        // TODO: Make Mail class
        // TODO: Pass message with url+token, and email to Mailer class
    }

    public static function setUserAsRegistered($user) : void {
        $database = DB::getDatabase();
        $database->update("user", ["status" => 1], ["id" => $user]);
    } 

    private static function sendPasswordChangingMessage($user) : void {
        // TODO: Check if user exists with that email address
        // TODO: Pass message with url+token, and email to Mailer class
    }
    
    public static function changePassword($user, $newPassword){
        $password = password_hash($newPassword, PASSWORD_DEFAULT);
        $database = DB::getDatabase();
        $database->update("user", ["password" => $password], ["id" => $user]);
    }

    public static function isAuthorized() {
        return $_SESSION['auth'] ?? FALSE;
    }
}
