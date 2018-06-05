<?php
namespace Notus\App\Forms\User;

use Notus\Modules\{Form, User, Message\MessageController as MSG, File};

class ChangePasswordForm extends Form\FormController
{
    public function getID() : string {
        return parent::getID() . '-change-password';
    }

    protected function canView() : bool {
        return User\Auth::isAuthorized();
    }

    protected function done() : void {
        header("Refresh:0");
    }

    protected function getFormData() : array {
        $data = parent::getFormData();
        $data['form']['title'] = 'Change password';
        $data['form']['top_description'] = 'Enter youre old and new password.';
        return $data;
    }

    public function getRenderer(array $data) : array {
        $data = [
            'current_password' => [
                'title' => 'current_password',
                'type' => 'password',
                'placeholder' => 'my biggest secret',                
                'description' => 'Your current password',
                'validator' => [
                    'max' => '512',
                    'required' => TRUE,
                ]
            ],
            'new_password' => [
                'title' => 'new_password',
                'type' => 'password',
                'placeholder' => 'some random sentence',                
                'description' => 'Your new password',
                'validator' => [
                    'max' => '512',
                    'required' => TRUE,
                ]
            ],
            'new_password_re' => [
                'title' => 'new_password_re',
                'type' => 'password',
                'placeholder' => 'look above',                
                'description' => 'Your new password (again)',
                'validator' => [
                    'max' => '512',
                    'required' => TRUE,
                ]
            ],
            'accept' => [
                'type' => 'submit',
                'value' => '>> ok'
            ],
            'close' => [
                'type' => 'div',
                'value' => '>> cancel'
            ],
        ];
        return $data;
    }

    public function validate(array &$data) : bool {
        if ($data['new_password'] !== $data['new_password_re']) {
            MSG::addErrorMessage(["message" => "New password ain't matching"]);
            return FALSE;
        }
        return TRUE;
    }
    
    public function submit(array $data) : bool {
        $userID = User\Auth::isAuthorized();
        
        if($userID === FALSE) return FALSE;
        $user = new User\User($userID);
        if($user->passwordCorrect($data["current_password"])){
            User\Auth::changePassword($userID, $data["new_password"]);
            MSG::addSuccessMessage(["message" => "Password changed"]);
        }else{
            MSG::addErrorMessage(["message" => "Incorrect current password"]);
            return FALSE;
        }
        return TRUE;
    }
}
