<?php
class PermissionController 
{
    static private $permission_table = 'notus_permissions';
    static private $user_permission_table = 'notus_user_permissions';

    public static function createNewPermission(string $key, string $name) : void {
        try{
            global $database;
            
        }catch(Exception $e){

        }
    }

    public static function hasPermission(string $key, $user) : bool {
        if($key === 'public') {
            return TRUE;
        }

    }

    public static function addPermission(string $key, $user) : void {
        try{
            global $database;
        }catch(Exception $e){
            
        }
    }

    public static function getPermissions($user) : array {
        try{
            global $database;
        }catch(Exception $e){
            
        }
    }

    public static function removePermission(string $key) : void {
        try{
            global $database;
        }catch(Exception $e){
            
        }
    }

    public static function deletePermission(string $key) : void {
        try{
            global $database;
        }catch(Exception $e){
            
        }
    }

}