<?php
namespace Notus\Modules\File;
use Siler\Dotenv;
use Notus\Modules\Database\Database as DB;
use Notus\Modules\User\Auth;
use \Exception as Exception;

class FileController
{
    public static function upload($file, $dest, $formats, $overwrite = FALSE, $maxSize = 5242880)
    {
        $user_id = Auth::isAuthorized();
        if($user_id === FALSE){
            throw new Exception('Unouthorized access!');
        }

        $file_dirr = Dotenv\env('FILE_PATH');
        $uri = $dest;
        $dest = $file_dirr . $dest;

        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];

        $exp_for_type = explode('.', $file['name']);
        $file_org_name = strtolower($exp_for_type[0]);
        $file_ext = strtolower(end($exp_for_type));
        $file_type_id = self::getTypeID($file_ext);
        if($file_type_id === FALSE){
            throw new Exception('Unknown file format');
        }

        $file_name = end(explode('/',$dest));
        //File extensions
        if (in_array($file_ext, $formats)) {
            if ($file['error'] === 0) {
                if ($file_size <= $maxSize) {
                    //Overwtitr
                    if(file_exists($dest) && $overwrite == true){
                        chmod($dest, 0755);
                        unlink($dest);
                    }
                    //Upload file
                    if (move_uploaded_file($file_tmp, $dest)) {
                        $id = self::saveToDatabase( $file_org_name, $file_type_id, $file_size, $uri, $user_id );
                        return $id;
                    } else {
                        throw new Exception('Unable to upload file');
                        exit();
                    }
                } else {
                    throw new Exception('File is over '. ($maxSize/104856) .' mb');
                    exit();
                }
            }else {
                throw new Exception('Exception ocured while uploading a file');
                exit();
            }
        }else {
            throw new Exception('Incorect file format. Alowed :', \join(",", $formats));
            exit();
        }
    }

    private static function saveToDatabase($name, $type, $size, $location, $author_id) {
        $database = DB::getDatabase();
        $database->insert("file",[
            "name" => $name,
            "type" => $type,
            "size" => $size,
            "url" => $location,
            "author_id" => $author_id,
        ]);
        return $database->id();
    }

    private static function getTypeID($type){
        $database = DB::getDatabase();
        $res = $database->select("file_type", "id", [
            "name" => $type
        ]);
        if(\sizeof($res) > 0){
            return $res[0];
        }
        return FALSE;
    }

    public static function getFile($id) : ?File
    {
        $database = DB::getDatabase();
        $data = $database->select("file",[
            "[>]file_type" => ["type" => "id"]
        ],[
            "file.id",
            "file_type.name[type]",
            "file.name",
            "file.size",
            "file.author_id",
            "file.url",
            "file.created",            
        ],[
            "file.id" => $id
        ]);

        if(\sizeof($data) > 0){
            $file = new \File($data[0]);
            return $file;
        }
        return NULL;
    }

    public static function getFiles(array $filesId) : array {
        $database = DB::getDatabase();
        $data = $database->select("file",[
            "[>]file_type" => ["type" => "id"]
        ],[
            "file.id",
            "file_type.name(type)",
            "file.name",
            "file.size",
            "file.author_id",
            "file.url",
            "file.created",            
        ],[
            "file.id" => $filesId
        ]);

        $files = [];
        foreach ($data as $file) {
            $files[] = new File($file);
        }
        return $files;
    }
}
