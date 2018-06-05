<?php
namespace Notus\App\Pages;

use Notus\App\{Forms\Authentication, Blocks\Landing};
use Notus\Modules\{Page, User\Auth};
use Siler\{Dotenv};
use Notus\Modules\Token;

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
        
        if($resetForm = self::getPasswordResetForm()){
            $blocks = [
                'new_password_form' => [
                    'body' => [$resetForm]
                ]
            ];
        }else{
            //Block 1 - Login form
            $loginBlock = self::getLoginBlock();
            //Block 2 - Register form
            $registerBlock = self::getRegisterBlock();
            //Block 3 - Password reset form
            $passwordResetForm = self::getPasswordResetBlock();
            
            $blocks = [
                'login_form' => [
                    'body' => [$loginBlock],
                    'attributes' => 'data-target="1"',
                ],
                'register_form' => [
                    'body' => [$registerBlock],
                ],
                'password_reset_form' => [
                    'body' => [$passwordResetForm],
                ],
            ];
        }


        $data = [
            'before' => [],
            'blocks' => $blocks,
            'after' => [],            
        ];

        return ['content' => $data];
    }

    private static function getPasswordResetForm() {
        $key = $_GET["password_reset"] ?? FALSE;
        if($key && $token = Token\Token::getTokenByKey($key)){
            if(Token\Token::isTokenValid($token)){
                $newPasswordForm = new Authentication\PasswordChangeForm([],["token"=>$token]);
                $newPasswordFormRender = $newPasswordForm->getOutput();
                return ['content' => $newPasswordFormRender];
            }
            die();
        }
        return FALSE;
    }

    private static function getPasswordResetBlock() : array{
        $resetForm = new Authentication\PasswordResetForm();
        $resetFormRenderer = $resetForm->getOutput();
        return ['content' => $resetFormRenderer ]; 
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
