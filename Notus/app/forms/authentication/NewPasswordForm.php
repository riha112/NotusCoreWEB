<?php
namespace Notus\App\Forms\Authentication;

use Notus\Modules\Form\FormController;
use Notus\Modules\{User, Message\MessageController as MSG};
use Notus\Modules\Token;
use Notus\Modules\Database\Database as DB;

class NewPasswordForm extends FormController
{
    public function getID() : string {
        return parent::getID() . '-new-password';
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
            'current_password' => [
                'name' => 'current_password',
                'type' => 'password',
                'limit' => '512',
                'placeholder' => 'Current password',
                'description' => 'Your current password.',
                'required' => TRUE,
                'title' => 'current_password',
            ],
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
        return TRUE;
    }
    
    public function submit(array $data) : bool {    
        return FALSE;
    }

}
