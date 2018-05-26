<?php
namespace Notus\App\Forms\Authentication;

use Notus\Modules\Form\FormController;

class RegisterForm extends FormController
{
    public function getID() : string {
        return parent::getID() . '-register';
    }

    protected function getFormData() : array {
        $data = parent::getFormData();
        $data['form']['title'] = 'NEW_USER_FORM';        
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
                'title' => 'username',
            ],
            'password' => [
                'name' => 'password',
                'type' => 'password',
                'limit' => '512',
                'placeholder' => 'Password',
                'description' => 'Your password.',
                'required' => TRUE,
                'title' => 'password',
                
            ],
            'password_re' => [
                'name' => 'password_re',
                'type' => 'password',
                'limit' => '512',
                'placeholder' => 'Password repeated',
                'description' => 'Repeat your password.',
                'required' => TRUE,
                'title' => 'password_re',
                
            ],
            'email' => [
                'name' => 'email',
                'type' => 'email',
                'limit' => '512',
                'placeholder' => 'Email address',                
                'description' => 'Your email address.',
                'required' => TRUE,
                'title' => 'email',
            ],
            /*
            'gender' => [
                'name' => 'gender',
                'type' => 'select',
                'options' => [
                    '-' => '-',
                    'male' => 'Male',
                    'female' => 'Female',
                ],
                'selected' => '-'
            ],*/
            'is_developer' => [
                'name' => 'is_developer',
                'type' => 'checkbox',
                'description' => 'Are you a developer?',
                'required' => TRUE,   
                'title' => 'is_developer',                             
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
        //TODO: Implement validation
        if ($data['gender'] == '-'){
            unset($data['gender']);
        }

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
            ],
            'email' => [
                'required' => TRUE,
                'charset' => ['email'],
            ],
            'first_name' => [
                'charset' => ['alphabet'],    
            ],
            'last_name' => [
                'charset' => ['alphabet'],    
            ],
            'gender' => [
                'one_of' => ['male','female']
            ],
            'accept_rules' => [
                'equal' => 1,
                'required' => TRUE,                
            ],
        ];

        if ($data['password'] !== $data['password_re']) {
            //TODO: Error password isn't matching
        }

        return TRUE;
    }
    
    public function submit(array $data) : bool {
        //TODO: Register user.

        //TODO: Send error message
    
        return TRUE;
    }

}
