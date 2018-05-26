<?php
namespace Notus\Modules\Twig;
use Notus\Modules\Render\{Renderable, Render};
use Notus\Modules\Translate\Translate;
use Twig\{Twig_Function, Twig_Filter};

class TwigFunctions
{
    private $twigFunctions = [];

    public static function __init($twig) : void {
        self::__define(self::$twigFunctions);
        foreach ($twigFunctions as $name => $function) {
            $twigFunction;
            if( is_callable($function) ) {
                $twigFunction = new Twig_Filter( $name, $function );
            } else {
                $twigFunction = new Twig_Function( $name, $function['function'] );
            }
            $twig->addFunction($twigFunction);
        }
    }

    /**
     * Add all custom TWIG functions here.
     */
    private static function __define(&$functions) : void {
        $functions['notusRender'] = function ($target) {
            if($target instanceof Renderable){
                return Render::render($target);
            }
            return $target;
        };
        $functions['notusAPI'] = function ($data) {
            return "?NO API YET";
        }; 
        $functions['notusTranslate'] = function (string $string) {
            return Translate::t($string);
        };
        $functions['getRoles'] = ['function' => function () {
            // TODO: Add role check
            return [];
        }];
        $functions['isAdmin'] = ['function' => function () {
            return FALSE;
        }];
    }
}
