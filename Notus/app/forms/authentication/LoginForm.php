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

    protected function inValid() : void {
        if(isset($_SESSION["LOGIN-FAIL"])){
            $_SESSION["LOGIN-FAIL"] += 1;
        }else{
            $_SESSION["LOGIN-FAIL"] = 1;
        }
        \var_dump($_SESSION["LOGIN-FAIL"]);
        parent::inValid();
    }

    public function getRenderer(array $data) : array {
        $data = [
            'username' => [
                'title' => 'username',                
                'type' => 'text',
                'placeholder' => 'Username',                
                'description' => 'Your username.',
                'validator' => [
                    'required' => TRUE,
                    'min' => 5,
                    'max' => 64,
                    'charset' => 'legal_characters',
                ]
            ],
            'password' => [
                'title' => 'password',                
                'type' => 'password',
                'limit' => '512',
                'placeholder' => 'Password',
                'description' => 'Your password.',
                'required' => TRUE,
                'validator' => [
                    'required' => TRUE,
                    'min' => 4,
                    'max' => 512,
                    'charset' => 'legal_characters',
                ],
            ],
            'submit' => [
                'type' => 'submit',
                'value' => '>> run'
            ]
        ];
        return $data;
    }
    
    public function submit(array $data) : bool {
        $logged = User\Auth::login($data);
        MSG::conditionalMessage($logged, ['message' => 'Wllcome back user!'], ['message' => 'Something went wrong!']);
        return $logged;
    }
}
