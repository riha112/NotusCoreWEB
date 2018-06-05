<?php
namespace Notus\Modules\User;
use Notus\Modules\Database\Database as DB;
use Notus\Modules\File;
class User
{
    private $data = [];
    private $id;

    public function __construct(int $id, bool $initData = TRUE) {
        $this->id = $id;
        if ($initData) {
            $this->initData();
        }
    }

    public function passwordCorrect($password) {
        if(isset($this->id)){
            $database = DB::getDatabase();
            $result = $database->select("user", ["password"], ["id" => $this->id]);
            if(\sizeof($result) > 0) {
                $passwordHash = $result[0]["password"];
                return password_verify($password, $passwordHash);
            }
        }
        return FALSE;
    }

    public function initData() : void {
        $database = DB::getDatabase();
        $userData = $database->select("user", [
            "[>]user_data" => ["id" => "user_id"]
        ],[
            "user_data.name",
            "user_data.surname",
            "user_data.about",
            "user_data.date_of_birth",
            "user_data.profile_picture",
            "user.username",
            "user.email",      
            "user.is_developer",      
            "user.status",    
            "user.id"                                                                                            
        ],[
            "user.id" => $this->id
        ]);
        if(\sizeof($userData) > 0){
            $profilePicture = $userData[0]["profile_picture"] ?? FALSE;
            if($profilePicture){
                $file = File\FileController::getFile($profilePicture);
                if($file != NULL){
                    $userData[0]["profile_picture_url"] = $file->getLocation();
                }
            }
            $this->data = $userData[0];
        }
    }

    private function _setField(string $field, string $value) : void {

    }

    public function getID() : int {
        return $this->id;
    }

    // NOTE: Move to new class UserData
    public function setFirstName(string $firstName) : void {
        // TODO: Validate
        $this->_setField('first_name', $firstName);
    }

    public function getFirstName() : ?string {
        return $this->data['first_name'] ?? NULL;
    }

    public function setLastName(string $lastName) : void {
        // TODO: Validate
        $this->_setField('last_name', $lastName);
    }

    public function getLastName() : ?string {
        return $this->data['last_name'] ?? NULL;
    }

    public function setDescription(string $description) : void {
        // TODO: Validate
        $this->_setField('description', $description);
    }

    public function getDescription() : ?string {
        return $this->data['description'] ?? NULL;
    }

    public function changeEmail(string $newEmail) : void {

    }

    public function getEmail() : string {
        return $this->data['email'] ?? NULL;
    }

    public function getData() : array {
        return $this->data;
    }
}
