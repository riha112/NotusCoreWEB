<?php
namespace Notus\App\Forms\Authentication;

use Notus\Modules\{Form, User, Message\MessageController as MSG};

class LogoutForm extends Form\FormController
{
    public function getID() : string {
        return parent::getID() . '-logout';
    }

    protected function getFormData() : array {
        $data = parent::getFormData();
        $data['form']['title'] = 'Are you sure?';
        $data['form']['top_description'] = 'Are you sure you want to logout?';
        return $data;
    }

    public function getRenderer(array $data) : array {
        $data = [
            'password' => [
                'title' => 'password',
                'type' => 'password',
                'placeholder' => 'password',                
                'description' => 'Your password',
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
    
    public function submit(array $data) : bool {
        $userID = User\Auth::isAuthorized();
        if($userID === FALSE) return FALSE;

        $user = new User\User($userID);
        if($user->passwordCorrect($data["password"])){
            User\Auth::setUserAsDeleted($userID);
            User\Auth::logout();
        }else{
            MSG::addErrorMessage(["message" => "Incorrect password"]);
            return FALSE;
        }

        MSG::addInfoMessage(["message" => "User deleted"]);
        return TRUE;
    }
}
