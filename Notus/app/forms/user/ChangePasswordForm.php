<?php
namespace Notus\App\Forms\User;

use Notus\Modules\{Form, User, Message\MessageController as MSG, File};

class ChangePasswordForm extends Form\FormController
{
    public function getID() : string {
        return parent::getID() . '-new-post';
    }

    protected function getFormData() : array {
        $data = parent::getFormData();
        $data['form']['title'] = 'NEW_POST_FORM';
        $data['form']['top_description'] = 'set new_post as Post:';
        $data['form']['bottom_description'] = ';';
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
            'submit' => [
                'name' => 'submit',
                'type' => 'submit',
                'value' => '>> run'
            ]
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
        }else{
            MSG::addErrorMessage(["message" => "Incorrect current password"]);
            return FALSE;
        }
        return TRUE;
    }
}
