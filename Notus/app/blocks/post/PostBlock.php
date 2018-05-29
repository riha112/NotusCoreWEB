<?php
namespace Notus\App\Blocks\Post;

use Notus\Modules\Block;
use Notus\Modules\Forum\Post;
use Notus\App\Forms\Forum\NewCommentForm;

class PostBlock extends Block\BlockController
{
    private $postID;

    public function __construct($postID){
        $this->postID = $postID;
        parent::__construct();
    }

    public function getID() : string {
        return parent::getID() . '-post';
    }

    public function getTemplatesName() : string {
        return 'post-block';
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


}
