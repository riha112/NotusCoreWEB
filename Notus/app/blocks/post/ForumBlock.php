<?php
namespace Notus\App\Blocks\Post;

use Notus\Modules\Block;
use Notus\App\Forms\Forum\SearchForm;
use Notus\Modules\Forum\Post;
use Notus\Modules\Database\Database as DB;
use Notus\Modules\Mail;

class ForumBlock extends Block\BlockController
{
    private static $PER_PAGE = 5;
    private $page, $type, $filter;

    public function __construct($page = 0, $type = null, $filter = null){
        $this->page = $page;
        $this->type = $type;
        $this->filter = $filter;      
        parent::__construct();
        Mail\Mail::mail("denkfrt@inbo.lv", "register", "hi");
    }

    public function getID() : string {
        return parent::getID() . '-forum';
    }

    public function getTemplatesName() : string {
        return 'forum-block';
    }

    protected function getBlocksData() : array {
        $page_count = ceil($this->getPostCount() / self::$PER_PAGE);
        $filter = new SearchForm();
        $data = [
            'posts' => $this->getPostList(),
            'pager' => [
                'page_count' => $page_count,
                'curr_page' => $this->page
            ],
            'filter_form' => $filter->getOutput(),
        ];
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
                $this->page * self::$PER_PAGE,
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
            "[>]user" => ["author_id" => "id"],
            "[>]post_type" => ["type" => "id"]            
        ],[
            "post.id",
            "user.username",
            "post.title",
            "post.content",
            "post_type.title(type)",
            "post.created"
        ], $condition);
    }

    public function getPostCount() :  int{
        $database = DB::getDatabase();
        $condition = [
            "AND" => [
                "post.status" => 1,
            ],
        ];
        if($this->type != null){
            $condition["AND"]["post.type"] = $this->type;
        }
        if($this->filter != null){
            $condition["AND"]["post.title[~]"] = $this->filter;
        }

        return $database->count("post",  $condition);
    }


}
