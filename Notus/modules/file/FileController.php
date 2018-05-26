<?php
namespace Notus\Modules\File;

class FileController
{
    public static function upload($file)
    {
        // TODO: upload file
        $size = $file["size"];
        $type = strtolower(pathinfo($file,PATHINFO_EXTENSION));
        
    }

    public static function getFile($id) : File
    {
        try {
            global $database;
        } catch (Exception $e) {
            //msg $e->getMessage();
        }
    }
}