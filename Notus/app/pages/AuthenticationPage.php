<?php
namespace Notus\App\Pages;

use Notus\App\{Forms\Authentication, Blocks\Landing};
use Notus\Modules\{Page, User\Auth};
use Siler\{Dotenv};

class AuthenticationPage extends Page\PageController
{

    protected static function canView() : bool {
        return Auth::isAuthorized() === FALSE;
    }

    public static function getID() : string {
        return parent::getID() . '-authentication';
    }

    public static function getTitle() : string {
        return 'Hello';
    }

    protected static function getPagesContentData(array $data = []) : array {
        //Block 1 - Login form
        $loginBlock = self::getLoginBlock();
        //Block 2 - Register form
        $registerBlock = self::getRegisterBlock();
        
        $blocks = [
            'login_form' => [
                'body' => [$loginBlock],
                'attributes' => 'data-target="1"',
            ],
            'register_form' => [
                'body' => [$registerBlock],
            ],
        ];


        $data = [
            'before' => [],
            'blocks' => $blocks,
            'after' => [],            
        ];

        return ['content' => $data];
    }

    private static function getLoginBlock() : array{
        $loginForm = new Authentication\LoginForm();
        $loginFormRenderer = $loginForm->getOutput();
        return ['content' => $loginFormRenderer ];        
    }

    private static function getRegisterBlock() : array{
        $registerForm = new Authentication\RegisterForm();
        $registerFormRenderer = $registerForm->getOutput();
        return ['content' => $registerFormRenderer ];  
    }

    protected static function setHTMLComponents(array &$data) {
        parent::setHTMLComponents($data);
        $css_dir_url = Dotenv\env('THEME_CSS');
    }

}
