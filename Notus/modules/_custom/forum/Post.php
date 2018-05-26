<?php
namespace Notes\Custom\Forum;
use Notus\Modules\Render\Renderable;
use Notus\Modules\Message\MessageController as MSG;
use Notus\Modules\Database\Database as DB;

class Post implements Renderable
{
    private $author, $content, $postID, $comments = []; 
    private $data = [
        /*
        ID
        TYPE
        DATE
        POINTS
        //AUTHOR
        //RAW CONTENT
        STATUS
        */
    ];
    public function _init(int $postID) : void {
        $this->postID = $postID;
        $this->_initPostData();
    }

    private function _initPostData() : void {
        $database = DB::getDatabase();
    }

    public static function create(array $data) : void {
        $database = DB::getDatabase();
    }

    public function changeStatus(bool $status) : void {
        $database = DB::getDatabase();
    }

    public function hasLiked(int $userID) : bool {
        if( isset($this->data['likes']) ){
            return isset($this->data['likes'][$userID]);
        }
        return FALSE;
    }

    public function like(int $userID) : void {
        if( !$this->hasLiked($userID) ){

        } else {
            // TODO Already liked
            MSG::addErrorMessage(['message' => 'Already liked']);
        }
    }

    public function dislike(int $userID) : void {
        if( $this->hasLiked($userID) ){

        } else {
            // TODO Already disliked
            MSG::addErrorMessage(['message' => 'Already disliked']);
        }
    }

    // -- From Renderable --
    public function getID() : string {
        return "notus-post-" . $this->postID;
    }

    public function getRenderArray() : array {
        return [
            'title' => '',
            'content' => '',
            'points' => '',
            'category' => [],
            'keywords' => [],
            'user' => [
                'profile_picture' => '',
                'username' => '',
            ],
            'comments' => [
                '0' => [
                    'date' => '',
                    'content' => '',
                    'user' => [
                        'profile_picture' => '',
                        'username' => '',
                    ],
                ]
            ]
        ];
    }

    public function getRenderTemplate() : string {
        return Notus\Modules\Twig\TwigUtil::getRenderTemplate('post', $this->getID(), 'post.html');
    }


}
