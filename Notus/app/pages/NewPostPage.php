<?php
namespace Notus\App\Pages;

use Notus\App\{Forms\Forum, Blocks\Landing};
use Notus\Modules\Page;
use Siler\{Dotenv};

class NewPostPage extends Page\PageController
{
    public static function getID() : string {
        return parent::getID() . '-new-post';
    }

    public static function getTitle() : string {
        return 'Create New Post';
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
        $form = new Forum\NewPostForm();
        $formRenderer = $form->getOutput();
        return ['content' => $formRenderer ];        
    }

    protected static function setHTMLComponents(array &$data) {
        parent::setHTMLComponents($data);
        $css_dir_url = Dotenv\env('THEME_CSS');
    }

}
