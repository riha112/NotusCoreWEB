<?php
namespace Notus\App\Blocks\Profile;

use Notus\Modules\Block;
use Notus\Modules\User;

class ProfileInfoBlock extends Block\BlockController
{
    public function getID() : string {
        return parent::getID() . '-profile-info';
    }

    public function getTemplatesName() : string {
        return 'profile-info-block';
    }

    protected function getBlocksData() : array {
        return ['block' => [
            "user_data" => $this->getUserData()
        ]];
    }

    private function getUserData() : array{
        if($user_id = User\Auth::isAuthorized()){
            $user_data = new User\User($user_id);
            $profileData = $user_data->getData();
            $data = [
                "base_info" => [
                    "username" => $profileData["username"] ?? NULL,
                    "profile_picture" => $profileData["profile_picture_url"] ?? NULL,            
                ],
                "body_info" => [
                    "name" => $profileData["name"] ?? NULL,
                    "surname" => $profileData["surname"] ?? NULL,            
                    "email" => $profileData["email"] ?? NULL,
                    "about" => $profileData["about"] ?? NULL,      
                ]      
            ];
            return $data;
        }
        return [];
    }


}
