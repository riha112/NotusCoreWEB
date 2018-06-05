<?php
namespace Notus\App\Blocks\Post;

use Notus\Modules\Block;
use Notus\Modules\Forum\Post;
use Notus\Modules\Database\Database as DB;

class UserPostsBlock extends Block\BlockController
{
    private $userID;

    public function __construct($userID){
        $this->userID = $userID;
        parent::__construct();
    }

    public function getID() : string {
        return parent::getID() . '-my-posts';
    }

    public function getTemplatesName() : string {
        return 'my-post-block';
    }

    protected function getBlocksData() : array {
        $data = [
            'posts' => $this->getPostList(),
        ];
        return ['block' => $data];
    }

    private function getPostList() : array {
        $database = DB::getDatabase();
        return $database->select("post", [
            "[>]user" => ["author_id" => "id"],
            "[>]post_type" => ["type" => "id"]            
        ],[
            "post.id",
            "user.username",
            "post.title",
            "post.content",
            "post_type.title(type)",
            "post.created"
        ], [
            "AND" => [
                "post.author_id" => $this->userID
            ],
        ]);
    }
}
