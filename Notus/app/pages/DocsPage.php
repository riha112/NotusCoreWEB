<?php
namespace Notus\App\Pages;

use Notus\Modules\Page;
use Notus\Modules\Riha\RihaCompiler;
use Siler\{Dotenv};

class DocsPage extends Page\PageController
{
    public static function getID() : string {
        return parent::getID() . '-docs';
    }

    public static function getTitle() : string {
        return 'Docs';
    }

    protected static function getFullPageData(string $content) : array {
        return parent::getFullPageData($content);
    }

    protected static function getPagesContentData(array $data = []) : array {
        $data = [
            'files' => self::getDocsArray()
        ];
        return ['content' => $data];
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

    private static function getDocsArray() : array {
        $files = [
            'data_type',
            'debug',
            'scope_loop',
            'scope_check',
            'conditions'
        ];
        $output = [];
        foreach ($files as $file) {
            $output[$file] = RihaCompiler::render($file);
        }
        return $output;
    }

}
