<?php
namespace Notus\App\Pages;

use Notus\App\{Forms\Authentication, Tables\DownloadTable};
use Notus\Modules\Page;
use Notus\Modules\Menu;
use Siler\{Dotenv};

class LandingPage extends Page\PageController
{
    public static function getID() : string {
        return parent::getID() . '-landing';
    }

    public static function getTitle() : string {
        return 'Home';
    }

    protected static function getFullPageData(string $content) : array {
        return parent::getFullPageData($content);
    }

    protected static function getPagesContentData(array $data = []) : array {

        $subMenu = new Menu\Menu();
        $subMenu->load(1);


        $data = [
            'page_title' => self::getPageTitle(),
            'page_sub_title' => self::getPageSubTitle(),
            'sub_menu' => $subMenu->getOutput(),
            'download_table' => self::getDownloadList()
        ];
        return ['content' => $data];
    }

    private static function getPageTitle() : string {
        $template = "%s <span class='blink'>%s</span>";
        return \sprintf($template, "Notus", "Core");
    }

    private static function getPageSubTitle() : string {
        return "[Game by Devs 4 Devs]";
    }

    private static function getDownloadList() : string {
        $table = new DownloadTable();
        return $table->getOutput();
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
