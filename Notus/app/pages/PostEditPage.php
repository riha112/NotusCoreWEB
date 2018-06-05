<?php
namespace Notus\App\Pages;

use Notus\App\{Forms\Forum};
use Notus\Modules\{Page, User\Auth, Forum\Post};
use Siler\{Dotenv};

class PostEditPage extends Page\PageController
{
    public static function getID() : string {
        return parent::getID() . '-edit-post';
    }

    public static function getTitle() : string {
        return 'Edit Post';
    }

    protected static function canView() : bool {
        $userID = Auth::isAuthorized();
        if($userID === FALSE) return FALSE;

        $postID = $_GET["post"] ?? NULL;
        if($postID !== NULL && \ctype_digit($postID)){
            return Post::isPostAuthor($postID, $userID);
        }
        return FALSE;
    }

    protected static function getPagesContentData(array $data = []) : array {
        $form = self::getForm();
        
        $blocks = [
            'form' => [
                'body' => [$form],
            ],
        ];
        $data = [
            'before' => [],
            'blocks' => $blocks,
            'after' => [],            
        ];

        return ['content' => $data];
    }

    private static function getForm() : array{
        $form = new Forum\EditPostForm();
        $formRenderer = $form->getOutput();
        return ['content' => $formRenderer ];        
    }

    protected static function setHTMLComponents(array &$data) {
        parent::setHTMLComponents($data);
        $css_dir_url = Dotenv\env('THEME_CSS');
    }

}
