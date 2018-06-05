<?php
namespace Notus\App\Forms\Authentication;

use Notus\Modules\Form\FormController;
use Notus\Modules\{User, Message\MessageController as MSG, Validator\Validator};

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
                'title' => 'username',                
                'type' => 'text',
                'placeholder' => 'Username',                
                'description' => 'Your username.',
                'validator' => [
                    'max' => '64',
                    'min' => '5', 
                    'required' => TRUE,
                    'charset' => 'legal_characters',                    
                ]
            ],
            'password' => [
                'title' => 'password',                
                'type' => 'password',
                'limit' => '512',
                'placeholder' => 'Password',
                'description' => 'Your password.',
                'validator' => [
                    'max' => '512',
                    'min' => '6', 
                    'required' => TRUE,
                    'charset' => 'legal_characters',                    
                ]
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
                'title' => 'email',                
                'type' => 'email',
                'placeholder' => 'Email address',                
                'description' => 'Your email address.',
                'validator' => [
                    'required' => TRUE,
                    'charset' => 'email',                    
                ]
            ],
            'is_developer' => [
                'title' => 'is_developer', 
                'type' => 'checkbox',
                'description' => 'Are you a developer?',
                'validator' => [
                    'one_of' => [0, 1],
                ]     
            ],
            'submit' => [
                'type' => 'submit',
                'value' => '>> run',
            ]
        ];
        return $data;
    }

    public function validate(array &$data) : bool {
        if ($data['password'] !== $data['password_re']) {
            MSG::addErrorMessage(["message" => "Password ain't matching"]);
            return FALSE;
        }
        return TRUE;
    }
    
    public function submit(array $data) : bool {
        //TODO: Register user.
        $registred = User\Auth::register($data);
        $succMSG = "Your username has been 
        created and a verification email has 
        been sent to the email address you used 
        to register. Please click on the link 
        in the email to complete your registration. 
        Without verification your registration and any 
        other requests made during this process is 
        not complete.";

        MSG::conditionalMessage(
            $registred, 
            ['message' => $succMSG], 
            ['message' => 'Something went wrong!']
        );
        
        //TODO: Send error message
    
        return $registred;
    }

}
