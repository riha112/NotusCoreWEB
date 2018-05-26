<?php
namespace Notus\Modules\Twig;

use Siler\Dotenv;
use Notus\Modules\Render\{Renderable, Render};


class TwigUtil
{
    public static function getPathToTemplate(string $category, ?string $id, string $name) : string {
        if( $id !== NULL ) {
            $uniquePath = "$category/" . $id . "/$name.twig";
            $pathToFile = Dotenv\env('TEMPLATES') . $uniquePath;
            $fileExists = \file_exists($pathToFile);
            if($fileExists){
                return $uniquePath;
            }
        }
        return "$category/$name.twig";
    }
}
