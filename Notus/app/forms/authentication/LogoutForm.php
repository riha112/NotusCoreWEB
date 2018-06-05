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
        User\Auth::logout();
        return TRUE;
    }
}
