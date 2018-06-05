<?php
namespace Notus\App\Pages;

use Notus\Modules\Page;
use Siler\{Dotenv};

class Page404 extends Page\PageController
{
    public static function getID() : string {
        return parent::getID() . '-404';
    }

    public static function getTitle() : string {
        return '404';
    }

    protected static function getFullPageData(string $content) : array {
        return parent::getFullPageData($content);
    }

    protected static function getPagesContentData(array $data = []) : array {
        $data = [
            'heading' => self::getPageTitle(),
            'description' => self::getPagesDescription(),
            'todo' => self::getPagesTodo(),
        ];
        return ['content' => $data];
    }

    private static function getPageTitle() : string {
        return "Notus Core";
    }

    private static function getPagesDescription() : string {
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return "A fatal exception <span>404</span> has occured at <span>$actual_link</span> the current page will be terminated.
        <br/><br/>
        * Redirect to different page to terminate the curent page<br/>
        * Press CTRL + F5 to restart this page. (It will not fix the problem)";
    }

    private static function getPagesTodo() : string {
        return "Press any key to do nothing";
    }  
    

    protected static function setHTMLComponents(array &$data) {
        parent::setHTMLComponents($data);
        $css_dir_url = Dotenv\env('THEME_CSS');
        $js_dir_url = Dotenv\env('BASE_JS');

        //HEAD SCRIPTSd
        //$data['start_scripts'] = [

        //];

        //HTML BOTTOM SCRIPTS
        $data['end_scripts']['landing_page'] = [
            'src' => $js_dir_url . 'landing-page/landing-page',
        ];
    }

}
