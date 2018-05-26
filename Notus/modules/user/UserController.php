<?php
namespace Notus\Modules\User;
class UserController
{
    public static function getUser(int $id) : User {
        return new User($id);
    }

    public static function getUserByUsername(string $username) : User {
        $id = 1; // TODO: Select from DB;
        return getUser($id);
    }

    public static function createUser(array $data) : ?User {

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