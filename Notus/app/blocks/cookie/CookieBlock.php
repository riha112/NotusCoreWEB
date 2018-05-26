<?php
namespace Notus\App\Blocks\Cookie;

use Notus\Modules\Block;
use Siler\Dotenv;

class CookieBlock extends Block\BlockController
{
    public function getID() : string {
        return parent::getID() . '-cookie';
    }

    public function getTemplatesName() : string {
        return 'cookie-block';
    }

    protected function getBlocksData() : array {
        return ['block' => [
            "title" => self::getBlockTitle(),
            'content' => self::getInfoText(),
            'cookie_list' => self::getCookieList(),
        ]];
    }

    private static function getBlockTitle() : string {
        return "Cookie & Privacy policy";
    }

    private static function getInfoText() : string {
        return "We use cookies to personalise content and ads, to provide social media features and to analyse our traffic. We
        also share information about your use of our site with our social media, advertising and analytics partners
        who may combine it with other information that you’ve provided to them or that they’ve collected from your
        use of their services. You consent to our cookies if you continue to use our website.";
    }

    private static function getCookieList() : array {
        return self::getJSON();
    }

    private static function getJSON() : array{
        $string = file_get_contents(Dotenv\env('FRONT') . "js/cookie/cookies.json");
        $json = json_decode($string, true);
        return $json;
    }

}
