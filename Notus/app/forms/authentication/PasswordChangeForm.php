<?php
namespace Notus\App\Forms\Authentication;

use Notus\Modules\Form\FormController;
use Notus\Modules\{User, Message\MessageController as MSG};
use Notus\Modules\Token;
use Notus\Modules\Database\Database as DB;
use Notus\Modules\User\Auth;

class PasswordChangeForm extends FormController
{
    public function getID() : string {
        return parent::getID() . '-change-password';
    }

    protected function getFormData() : array {
        $data = parent::getFormData();
        $data['form']['title'] = 'NEW_PASSWORD_FORM';        
        $data['form']['top_description'] = 'set new_password as Password:';
        $data['form']['bottom_description'] = ';';
        return $data;
    }

    public function getRenderer(array $data) : array {
        $data = [
            'password' => [
                'name' => 'password',
                'type' => 'password',
                'limit' => '512',
                'placeholder' => 'Password',
                'description' => 'Your new password.',
                'required' => TRUE,
                'title' => 'new_password',
            ],
            'password_re' => [
                'name' => 'password_re',
                'type' => 'password',
                'limit' => '512',
                'placeholder' => 'Password repeated',
                'description' => 'Repeat your new password.',
                'required' => TRUE,
                'title' => 'new_password_re',
            ],
            'submit' => [
                'name' => 'submit',
                'type' => 'submit',
                'value' => '>> run',
            ]
        ];
        return $data;
    }

    public function validate(array &$data) : bool {
        if($data["password"] != $data["password_re"]){
            return FALSE;
        }
        return TRUE;
    }
    
    public function submit(array $data) : bool {    
        if(isset($this->vars["token"]["user_id"])){
            Auth::changePassword($this->vars["token"]["user_id"], $data["password"]);
            Token\Token::removeToken($this->vars["token"]["id"]);
            return TRUE;
        }
        return FALSE;
    }

}
