<?php
namespace Notus\Modules\Page;

interface PageInterface{
    public static function getTitle() : string;    
    public static function getId() : string;    
    //public static function getOutput();
}
