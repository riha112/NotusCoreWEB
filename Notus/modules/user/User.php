<?php
namespace Notus\Modules\User;
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

    public function initData() : void {
        try{
            global $database;
            // TODO: get "all" user data;
        }catch( Exception $e ){
            // TODO: msg stuff
        }
    }

    private function _setField(string $field, string $value) : void {

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

}
