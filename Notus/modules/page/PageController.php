<?php
namespace Notus\Modules\Page;

use Siler\{Dotenv, Twig};
use Notus\Modules\Message\MessageController as MSG;
use Notus\Modules\Twig\TwigUtil;
use Notus\App\Blocks\Cookie\CookieBlock;
use Notus\Modules\Menu;

class PageController implements PageInterface
{
    //private static $renderedOutput = NULL;
    protected static $params;

    public static function _init(array $params = []) {
        if(!static::canView()) {
            //$_SESSION["ACCESS_DENIED"] = TRUE;
            $_SESSION["404"] = TRUE;            
            return;
        }

        if(isset($_POST['AJAX'])){
            static::AJAX();
            return;
        }

        static::$params = $params;
        
        $contentData = static::getPagesContentData();
        $contentRendered = static::getRenderedPagesContent($contentData);

        $fullData = static::getFullPageData($contentRendered);
        $fullPageRendered = static::getRenderedFullPage($fullData);

        $htmlData = static::getHTMLData($fullPageRendered);
        echo static::getRenderedHTML($htmlData);
        echo self::getSideRow();

        $_SESSION["404"] =  FALSE;
    }

    protected static function AJAX() {

    }

    protected static function canView() : bool{
        return TRUE;
    }

    public static function getID() : string {
        return 'notus-page';
    }

    public static function getTitle() : string {
        return 'Page';
    }

    //Returns page/[].twig or page/id/[].twig
    private static function getPathToTemplate(string $name) : string {
        return TwigUtil::getPathToTemplate('page', static::getID(), $name);
    }

    //Renderers
    private static function getRenderedHTML(array $data) : string {
        $templatePath = static::getPathToTemplate('page.html');
        $output = Twig\render($templatePath, $data);
        return $output;
    }

    private static function getRenderedFullPage(array $data = []) : string {
        $templatePath = static::getPathToTemplate('page.full');
        $output = Twig\render($templatePath, $data);
        return $output;
    }

    private static function getRenderedPageHeader() : string {
        $templatePath = static::getPathToTemplate('page.header');
        $headerMenu = new Menu\Menu();
        $headerMenu->load(2);
        $renderedMenu = $headerMenu->getOutput();
        $output = Twig\render($templatePath,["menu" => $renderedMenu]);
        return $output;
    }

    private static function getRenderedPagesContent(array $data = []) : string {
        $templatePath = static::getPathToTemplate('page.content');
        $output = Twig\render($templatePath, $data);
        return $output;
    }

    private static function getRenderedPageFooter() : string {
        $templatePath = static::getPathToTemplate('page.footer');
        $output = Twig\render($templatePath);
        return $output;
    }

    private static function getHTMLData(string $content) : array {
        $cookieBlockRendered = "";
        if(!isset($_COOKIE['allowCookies'])){
            $cookieBlock = new CookieBlock();
            $cookieBlockRendered =  $cookieBlock->getOutput();
        }

        $htmlData = [
            'page' => [
                'title' => static::getTitle(),
                'content' => $content,
                'id' => static::getID(),
                'messages' => MSG::getBundlesOutput(),
                'cookie_block' => $cookieBlockRendered,
            ],
        ];
        $htmlData['cookie'] = !isset($_COOKIE['accept_cookies']);
        static::setHTMLComponents($htmlData);
        return ['html' => $htmlData];
    }

    private static function getSideRow() : string{
        $output = "";
        for($i = 0; $i < 999; $i++){
            $o = ($i < 10) ?  '0' . $i : $i;
            $output .= \sprintf(
                "<div class='line'>%s</div>", $o
            );
        }
        return sprintf("<div class='side-lines'>%s</div>", $output);
    }

    //Rewritable
    protected static function getFullPageData(string $content) : array {
        $data = [
            'header' => static::getRenderedPageHeader(),
            'content' => $content,
            'footer' => static::getRenderedPageFooter(),
            'title' => static::getTitle(),
            'id' => static::getID(),
        ]; 
        return ['page' => $data];
    }

    protected static function getPagesContentData(array $data = []) : array {
        return $data;
    }

    protected static function setHTMLComponents(array &$data) {
        //STYLESHEETS
        $css_dir_url = Dotenv\env('THEME_CSS');
        $js_dir_url = Dotenv\env('BASE_JS');

        $data['styles'] = [
            'normalizer' => [
                'href' => $css_dir_url . 'normalize',
            ],
            'base_stylesheet' => [
                'href' => $css_dir_url . 'base/base',
            ],
            'main_stylesheet' => [
                'href' => $css_dir_url . 'theme/theme',
            ]
        ];

        //HEAD SCRIPTS
        $data['start_scripts'] = [
            'cookie_overwrite', [
                'src' => $js_dir_url . 'cookie/cookie_overwrite'
            ],
            'jQuery' =>  [ 
                'src' => $js_dir_url . 'jquery'
            ],
            'jQuery_cookie' =>  [ 
                'src' => $js_dir_url . 'jquery.cookie'
            ],
            'niceSelect' =>  [
                'src' => $js_dir_url . 'nice-select/jquery.nice-select.min'
            ],
            'app' => [
                'src' => $js_dir_url . 'app'
            ],                  
        ];

        if(!isset($_COOKIE['allowCookies'])){
            $data['start_scripts']['cookie_controller'] = [
                'src' => $js_dir_url . 'cookie/cookie_controller'
            ];
        }

        //HTML BOTTOM SCRIPTS
        $data['end_scripts'] = [
            'input' => [
                'src' => $js_dir_url . 'input'
            ],
            'authentication' => [
                'src' => $js_dir_url . 'authentication'
            ],
            'home' => [
                'src' => $js_dir_url . 'home'
            ],
            'post' => [
                'src' => $js_dir_url . 'post'
            ]         
        ];
    }

    /*public static function getOutput() {
        return function() {
           echo static::renderedOutput;
        };
    }*/

}
