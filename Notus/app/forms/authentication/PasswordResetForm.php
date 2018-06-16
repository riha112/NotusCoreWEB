<?php
namespace Notus\App\Forms\Authentication;

use Notus\Modules\Form\FormController;
use Notus\Modules\{User, Message\MessageController as MSG};
use Notus\Modules\Token;
use Notus\Modules\Database\Database as DB;

class PasswordResetForm extends FormController
{
    public function getID() : string {
        return parent::getID() . '-reset-password';
    }

    protected function getFormData() : array {
        $data = parent::getFormData();
        $data['form']['top_description'] = 'set lost_user as User:';
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
        $validationArray = [
            'username' => [
                'required' => TRUE,
                'charset' => ['legal_characters'],
                'min' => 4               
            ],
        ];

        $database = DB::getDatabase();
        $user_id = $database->select(
            "user", [ "id" ], [ "username" => $data["username"] ]
        );

        if(\sizeof($user_id) < 0){
            return FALSE;
        }

        $data["user_id"] = $user_id[0]["id"];
        return TRUE;
    }
    
    public function submit(array $data) : bool {    
        $token_data = [
            "user_id" => $data["user_id"],
            "type" => 2
        ];

        if($token = Token\Token::createTokken($token_data)){
            // Send message
           // User\Auth::sendPasswordChangingMessage($token["user_id"], $token["hash_key"]);

            return TRUE;
        }
        return FALSE;
    }

}
