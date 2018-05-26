<?php
namespace Notus\App\Blocks\Profile;

use Notus\Modules\Block;

class ProfileInfoBlock extends Block\BlockController
{
    public function getID() : string {
        return parent::getID() . '-profile-info';
    }

    public function getTemplatesName() : string {
        return 'profile-info-block';
    }

    protected function getBlocksData() : array {
        return ['block' => []];
    }


}
