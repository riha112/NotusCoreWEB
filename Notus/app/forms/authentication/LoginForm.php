<?php
namespace Notus\App\Forms\Authentication;

use Notus\Modules\{Form, User, Message\MessageController as MSG};

class LoginForm extends Form\FormController
{
    public function getID() : string {
        return parent::getID() . '-login';
    }

    protected function getFormData() : array {
        $data = parent::getFormData();
        $data['form']['title'] = 'USER_LOGIN_FORM';
        $data['form']['todo'] = 'Fill empty fields!';        
        $data['form']['top_description'] = 'set new_user as User:';
        $data['form']['bottom_description'] = ';';
        return $data;
    }

    public function getRenderer(array $data) : array {
        $data = [
            'username' => [
                'name' => 'username',
                'type' => 'text',
                'limit' => '64',
                'placeholder' => 'Username',                
                'description' => 'Your username.',
                'required' => TRUE,
                'title' => 'username'
            ],
            'password' => [
                'name' => 'password',
                'type' => 'password',
                'limit' => '512',
                'placeholder' => 'Password',
                'description' => 'Your password.',
                'required' => TRUE,
                'title' => 'password'
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
        //TODO: Validate password & username
        $validationArray = [
            'password' => [
                'required' => TRUE,
                'charset' => ['legal_characters'],
                'min' => 6
            ],
            'username' => [
                'required' => TRUE,
                'charset' => ['legal_characters'],
                'min' => 4               
            ]
        ];
        
        return TRUE;
    }
    
    public function submit(array $data) : bool {
        $logged = User\Auth::login($data);
        MSG::conditionalMessage($logged, ['message' => 'All ok!'], ['message' => 'Something went wrong!']);
        return $logged;
    }
}
