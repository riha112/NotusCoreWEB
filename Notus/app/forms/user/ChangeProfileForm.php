<?php
namespace Notus\App\Forms\User;

use Notus\Modules\{Form, User, Message\MessageController as MSG, File};

class ChangeProfileForm extends Form\FormController
{
    public function getID() : string {
        return parent::getID() . '-new-post';
    }

    protected function canView() : bool {
        return User\Auth::isAuthorized();
    }

    protected function done() : void {
        header("Refresh:0");
    }

    protected function getFormData() : array {
        $data = parent::getFormData();
        $data['form']['title'] = 'Change profile data';
        $data['form']['top_description'] = 'Enter missing data';
        return $data;
    }

    public function getRenderer(array $data) : array {
        $data = [
            'name' => [
                'title' => 'name',
                'type' => 'text',
                'placeholder' => 'Jack',                
                'description' => 'Name',
                'validator' => [
                    'max' => '128',
                ]
            ],
            'surname' => [
                'title' => 'surname',
                'type' => 'text',
                'placeholder' => 'Jackson',
                'description' => 'Surname',
                'validator' => [
                    'max' => '128',
                ],
            ],
            'about' => [
                'title' => 'about',
                'type' => 'textarea',
                'placeholder' => "Hi, I like trains!",
                'validator' => [
                    'max' => '512'
                ],
            ],
            'date_of_birth' => [
                'title' => 'date_of_birth',
                'type' => 'date',
                'description' => 'When where you born'
            ],
            'profile_picture' => [
                "name" => "attachment",
                "type" => "file",
                "description" => "Profile picture",
                "title" => "profile_picture",
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
        $data["user_id"] = $userID;

        if(isset($_FILES["profile_picture"]) && !empty($_FILES["profile_picture"]["size"])){
            $allowedTypes = ["png","gif","jpg"];
            $file = $_FILES["profile_picture"];
            try{
                $name = bin2hex(random_bytes(12));
                $data["profile_picture"] = File\FileController::upload($file, "profile_pictures/$name",$allowedTypes);
            }catch(\Exception $e){
                MSG::addErrorMessage(["message" => $e->getMessage()]);
                return FALSE;
            }
        }

        $fields = ["user_id", "name", "surname", "about", "date_of_birth", "profile_picture"];
        $newUserData = [];
        foreach ($fields as $field) {
            if(isset($data[$field]) && !empty($data[$field])){
                $newUserData[$field] = $data[$field];
            }
        }

        User\UserController::insertAboutData($newUserData);

        return TRUE;
    }
}
