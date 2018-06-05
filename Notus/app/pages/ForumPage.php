<?php
namespace Notus\App\Pages;

use Notus\App\Blocks\Post;
use Notus\Modules\Page;
use Siler\{Dotenv};
use Notus\Modules\Forum;
use Notus\Modules\User\Auth;

class ForumPage extends Page\PageController
{
    public static function getID() : string {
        return parent::getID() . '-post';
    }

    public static function getTitle() : string {
        return 'Post';
    }

    protected static function getPagesContentData(array $data = []) : array {

        if(isset($_GET['post']) && \is_numeric($_GET['post'])){
            $postContent = self::getPostsContent($_GET['post']);
            $blocks = [
                'post' => [
                    'body' => [$postContent],
                ]
            ];
        } else {
            $page = $_GET['page'] ?? 0;
            $type = $_GET['type'] ?? NULL;
            $filter = $_GET['filter'] ?? NULL;  
            if($type == 0) 
                $type = NULL;

            $forumContent = self::getForumContent($page, $type, $filter);
            $blocks = [
                'forum' => [
                    'body' => [$forumContent]
                ]
            ];
        }

        $data = [
            'before' => [],
            'blocks' => $blocks,
            'after' => [],            
        ];
        return ['content' => $data];
    }

    protected static function AJAX() {
        if(isset($_POST['post_id'])){
            $post = new Forum\Post();
            $post->postID = $_POST['post_id'];
            $user_id = Auth::isAuthorized();
            if($user_id !== FALSE ){
                if(isset($_POST['like'])){
                    $post->like($user_id);
                }else if(isset($_POST['dislike'])){
                    $post->dislike($user_id);        
                }
                echo $post->getPostLikes();
            }
        }
    }

    private static function getPostsContent(int $postID) : array {
        $post = new Post\PostBlock($postID);
        return [ 'content' => $post->getOutput() ];
    }
    private static function getForumContent(int $page, $type, $filter) : array {
        $forumBlock = new Post\ForumBlock($page, $type, $filter);
        return [ 'content' => $forumBlock->getOutput() ];
    }

    protected static function setHTMLComponents(array &$data) {
        parent::setHTMLComponents($data);
        $css_dir_url = Dotenv\env('THEME_CSS');
    }

}
