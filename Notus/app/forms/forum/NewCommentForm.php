<?php
namespace Notus\App\Forms\Forum;

use Notus\Modules\{Form, User, Message\MessageController as MSG};
use Notus\Modules\Database\Database as DB;
use Notus\Modules\User\Auth;

class NewCommentForm extends Form\FormController
{
    public function getID() : string {
        return parent::getID() . '-new-comment';
    }

    protected function canView() : bool {
        return Auth::isAuthorized();
    }

    protected function getFormData() : array {
        $data = parent::getFormData();
        $data['form']['top_description'] = 'set new_comment as Comment:';
        $data['form']['bottom_description'] = ';';
        return $data;
    }

    public function getRenderer(array $data) : array {
        $data = [
            'content' => [
                'name' => 'content',
                'type' => 'textarea',
                'placeholder' => 'Lorem ipsum dolar sit amet...',
                'description' => 'Content of comment.',
                'required' => TRUE,
                'title' => 'content',
                'limit' => 512,
            ],
            'submit' => [
                'name' => 'submit',
                'type' => 'submit',
                'value' => '>> run'
            ]
        ];
        return $data;
    }

    public function validate(array &$data) : bool {
        $post_ok = isset($_GET['post']) && is_numeric($_GET['post']);
        $content_ok = isset($data['content']) && !empty($data['content']);
        return $post_ok && $content_ok;

    }
    
    public function submit(array $data) : bool {

        $database = DB::getDatabase();
        if($userID = Auth::isAuthorized() !== FALSE){
            $database->insert("comment", [
                'post_id' => $_GET['post'],
                'author_id' => $userID,
                'content' => $data['content'],                                                            
            ]);
            return TRUE;
        }
        return FALSE;
    }

    protected function done() : void {
        header("Refresh:0");
    }
}
