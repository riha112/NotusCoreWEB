<?php
namespace Notus\App\Blocks\Games;

use Notus\Modules\Block;
use Notus\Modules\User;
use Notus\Modules\Game;

class MyGamesBlock extends Block\BlockController
{
    public function getID() : string {
        return parent::getID() . '-my-games';
    }

    public function getTemplatesName() : string {
        return 'my-games-block';
    }

    protected function getBlocksData() : array {
        return ['block' => [
            "game_data" => $this->getGameData()
        ]];
    }

    private function getGameData() : array{
        if($user_id = User\Auth::isAuthorized()){
            return Game\GameController::loadUserGames($user_id);
        }
        return [];
    }


}
