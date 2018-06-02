<?php
namespace Notus\App\Blocks\Post;

use Notus\Modules\Block;
use Notus\Modules\Forum\Post;
use Notus\Modules\Database\Database as DB;

class ForumBlock extends Block\BlockController
{
    private static $PER_PAGE = 10;
    private $page, $type, $filter;

    public function __construct($page = 0, $type = null, $filter = null){
        $this->page = $page;
        $this->type = $type;
        $this->filter = $filter;        
        parent::__construct();
    }

    public function getID() : string {
        return parent::getID() . '-forum';
    }

    public function getTemplatesName() : string {
        return 'forum-block';
    }

    protected function getBlocksData() : array {
        $commentForm = new NewCommentForm();

        $post = new Post();
        $post->_init($this->postID);
        $data = $post->getRenderArray();
        $data['comments'] = $post->getPostComments();
        $data['comment_count'] = sizeof($data['comments']);
        $data['new_comment_form'] = $commentForm->getOutput();

        return ['block' => $data];
    }

    private function getPostList() : array {
        $database = DB::getDatabase();
        $condition = [
            "AND" => [
                "post.status" => 1,
            ],
            "ORDER" => ["post.created" => "DESC"],
            "LIMIT" => [
                $this->page * self::PER_PAGE,
                self::$PER_PAGE
            ]
        ];

        
        if($this->type != null){
            $condition["AND"]["post.type"] = $this->type;
        }

        if($this->filter != null){
            $condition["AND"]["post.title[~]"] = $this->filter;
        }

        return $database->select("post", [
            "[>]user" => ["post.author_id" => user.id],
            "[>]post_type" => ["post.type" => post_type.id]            
        ],[
            "user.username",
            "post.title",
            "post.content",
            "post_type.name",
            "post.created"
        ], $condition);
    }


}
