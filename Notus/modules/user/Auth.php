<?php
namespace Notus\Modules\User;
use Notus\Modules\Message\MessageController as MSG;
//TODO: Login, Register, Send confirm email, Change password, Generate token. 
class Auth
{
    public static function login(array $data) : bool {
        try{
            $user_data = self::getUserData($data['username']);
            if(self::canLogin($data, $user_data)){
                if(!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['auth'] = 1;
                return TRUE;
            }else{
                throw new Exception('Wrong username or/and password');
            }
        }catch(Exception $e){
            MSG::addErrorMessage(['message' => $e->getMessage()]);
        }finally{
            return FALSE;
        }
    }
    private static function canLogin(array $data, array $user_data) : bool {
        // TODO: Validate login data
        return $user_data['password'] == $data['password'];
            //return password_verify($data['password'],$user_data['password']);
    }

    private static function getUserData(string $username) : ?array {
        global $database;
        $data = $database->select('user', [ 'username', 'password', 'id' ], [ 'username' => $username ]);
        if(!empty($data) && \is_array($data)){
            $user_data = $data[0];
            return $user_data;
        }
        throw new Exception('Wrong username or/and password');
    }

    public static function register($data) : bool {
        // TODO: Pass data to db
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

    private static function setUserAsRegistered($user) : void {
        // TODO: Update users state from pending to active
        // Other states mey include : blocked, deleted, pending, active
    } 

    private static function sendPasswordChangingMessage($user) : void {
        // TODO: Check if user exists with that email address
        // TODO: Pass message with url+token, and email to Mailer class
    }
    
    private static function changePassword($user, $newPassword) : bool {
        // TODO: Change password
    }

    private static function isAuthorized() : bool {
        return $_SESSION['auth'] ?? FALSE;
        // TODO: Check token expiration date
    }
}
