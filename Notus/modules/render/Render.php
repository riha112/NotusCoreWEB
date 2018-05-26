<?php
namespace Notus\Modules\Render;

use Siler\{Dotenv, Twig};

class Render{
    public static function render(Renderable $renderable) : string{
        $output = "";
        if($renderable instanceof Renderable){
            // TODO twig stuff
            $output = Twig\render(
                $renderable->getRenderTemplate(), 
                $renderable->getRenderArray()
            );
        }
        return $output;
    }

}