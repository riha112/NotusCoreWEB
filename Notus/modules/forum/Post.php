<?php
namespace Notus\Modules\Forum;

use Notus\Modules\Render\Renderable;
use Notus\Modules\Message\MessageController as MSG;
use Notus\Modules\Database\Database as DB;
use Notus\Modules\File\FileController;

class Post implements Renderable
{
    public $postID; 
    private $data = [];

    public function _init(int $postID) : void {
        $this->postID = $postID;
        $this->_initPostData();
    }

    private function _initPostData() : void {
        $database = DB::getDatabase();
        $result = $database->query(
            "SELECT 
            author_id,
            user.username as author_name, 
            post.title, 
            content, 
            post_type.title AS `type`, 
            created, 
            post.status  
            FROM `post` 
            LEFT JOIN post_type 
            ON post.type = post_type.id 
            LEFT JOIN user 
            ON user.id = author_id
            WHERE post.id = :post_id",[
                ':post_id' => $this->postID
        ])->fetchAll();


        if(\is_array($result) && \sizeof($result) > 0){
            $points = $this->getPostLikes();
            $attachments = $this->getPostAttachments();
            $result = $result[0];
            $this->data = [
                'author' => [
                    'id' => $result['author_id'],
                    'username' => $result['author_name']
                ],
                'post' => [
                    'title' => $result['title'],
                    'content' => $result['content'],
                    'type' => $result['type'],
                    'points' => $points,
                ],
                'created' => $result['created'],
                'status' => $result['status'],
                'attachments' => $attachments
            ];
        }
    }

    public function getPostLikes() : int {
        $database = DB::getDatabase();
        $likes = $database->count("post_likes",[
            "post_id" => $this->postID,
            "is_like" => 1,
        ]);        

        $dislikes = $database->count("post_likes",[
            "post_id" => $this->postID,
            "is_like" => 0,
        ]); 
        return $likes - $dislikes;
    }

    private function getPostAttachments() : array {
        $database = DB::getDatabase();
        $attachments = $database->select("post_attachment",["fid"],["pid" => $this->postID]);        
        
        $attachment_ids = [];
        foreach ($attachments as $attachment) {
            $attachment_ids[] = $attachment['fid'];
        }

        $files = FileController::getFiles($attachment_ids);
        $attachment_data = [];
        foreach ($files as $file) {
            $attachment_data[] = $file->rawData;    
        }
        return $attachment_data;
    }

    public function getPostComments() : array{
        $database = DB::getDatabase();
        return $database->select("comment", [
            "[>]user" => ["author_id" => "id"]
        ],[
            "comment.author_id",
            "user.username",
            "comment.content",
            "comment.created",
        ],[
            "comment.post_id" => $this->postID,
            "ORDER" => ["comment.created" => "DESC"]
        ]);       
    }

    public static function create(array $data, array $attachments) : void {
        $database = DB::getDatabase();
        $database->insert("post", $data);
        $postID = $database->id();
        foreach($attachments as $attachment){
            $database->insert("post_attachment", [
                "pid" => $postID,
                "fid" => $attachment,
            ]);
        }
    }

    public function changeStatus(bool $status) : void {
        $database = DB::getDatabase();
        $database->update("post", [
            'status' => $status
        ],[
            "id" => $this->postID
        ]);
    }

    public function hasLiked(int $userID) : bool {
        $database = DB::getDatabase();
        return $database->has("post_likes", [
            "AND" => [
                "post_id" => $this->postID,
                "user_id" => $userID,
                "is_like" => 1,
            ]
        ]);
    }

    public function hasDisliked(int $userID) : bool {
        $database = DB::getDatabase();
        return $database->has("post_likes", [
            "AND" => [
                "post_id" => $this->postID,
                "user_id" => $userID,
                "is_like" => 0,
            ]
        ]);
    }

    public function like(int $userID) : bool {
        if( !$this->hasLiked($userID) ){
            if($this->hasDisliked($userID))
                self::removePoint($this->postID, $userID, 0);
            self::addPoint($this->postID, $userID, 1);
            return true;
        } else {
            // TODO Already liked
            //MSG::addErrorMessage(['message' => 'Already liked']);
            return false;
        }
    } 

    public function dislike(int $userID) : bool {
        if( !$this->hasDisliked($userID) ){
            if($this->hasLiked($userID))
                self::removePoint($this->postID, $userID, 1);
            self::addPoint($this->postID, $userID, 0);
            return true;
        } else {
            // TODO Already disliked
            //MSG::addErrorMessage(['message' => 'Already disliked']);
            return false;            
        }
    }

    private static function addPoint(int $postID, int $userID, int $state){
        $database = DB::getDatabase();
        $database->insert("post_likes", [
            "post_id" => $postID,
            "user_id" => $userID,
            "is_like" => $state
        ]);   
    }

    private static function removePoint(int $postID, int $userID, int $state){
        $database = DB::getDatabase();
        $database->delete("post_likes", [
            "AND" => [
                "post_id" => $postID,
                "user_id" => $userID,
                "is_like" => $state
            ]
        ]);   
    }

    // -- From Renderable --
    public function getID() : string {
        return "notus-post-" . $this->postID;
    }

    public function getRenderArray() : array {
        return $this->data;
    }

    public function getRenderTemplate() : string {
        return Notus\Modules\Twig\TwigUtil::getRenderTemplate('post', $this->getID(), 'post.html');
    }


}
