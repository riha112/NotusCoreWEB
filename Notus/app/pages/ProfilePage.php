<?php
namespace Notus\App\Pages;

use Notus\App\Blocks\Profile;
use Notus\App\Blocks\Games;
use Notus\App\Blocks\Post\UserPostsBlock;
use Notus\App\Forms\User\ChangeProfileForm;
use Notus\App\Forms\Authentication\LogoutForm;

use Notus\Modules\Page;
use Notus\Modules\Menu;
use Siler\{Dotenv};
use Notus\Modules\User\Auth;

class ProfilePage extends Page\PageController
{
    public static function getID() : string {
        return parent::getID() . '-profile';
    }

    public static function getTitle() : string {
        return 'Profile';
    }

    protected static function getFullPageData(string $content) : array {
        return parent::getFullPageData($content);
    }

    protected static function getPagesContentData(array $data = []) : array {
        $data = [
            "about" => self::getProfilePageData(),
            "my_games" => self::getGameData(),
            "my_posts" => self::getMyPosts(),
            "logout_form" => self::getLogoutForm(),
            "change_profile" => self::getChangeForm(),
        ];
        return ['content' => $data];
    }

    private static function getProfilePageData() : array {
        $profileBlock = new Profile\ProfileInfoBlock();
        $data = $profileBlock->getOutput();
        return ["content" => $data];
    }

    private static function getGameData() : array{
        $gameBlock = new Games\MyGamesBlock();
        $data = $gameBlock->getOutput();
        return ["content" => $data];
    }

    private static function getMyPosts() : array{
        $data = [];
        if($user = Auth::isAuthorized()){
            $gameBlock = new UserPostsBlock($user);
            $data = $gameBlock->getOutput();
        }
        return ["content" => $data];
    }

    private static function getLogoutForm() : array {
        $form = new LogoutForm();
        $data = $form->getOutput();
        return ["content" => $data];
    }
    private static function getChangeForm() : array {
        $form = new ChangeProfileForm();
        $data = $form->getOutput();
        return ["content" => $data];
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
