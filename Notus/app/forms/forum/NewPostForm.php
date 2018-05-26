<?php
namespace Notus\App\Forms\Forum;

use Notus\Modules\{Form, User, Message\MessageController as MSG};

class NewPostForm extends Form\FormController
{
    public function getID() : string {
        return parent::getID() . '-new-post';
    }

    protected function getFormData() : array {
        $data = parent::getFormData();
        $data['form']['title'] = 'NEW_POST_FORM';
        $data['form']['top_description'] = 'set new_post as Post:';
        $data['form']['bottom_description'] = ';';
        return $data;
    }

    public function getRenderer(array $data) : array {
        $data = [
            'title' => [
                'name' => 'title',
                'type' => 'text',
                'limit' => '128',
                'placeholder' => 'How to make post?',                
                'description' => 'Title of post.',
                'required' => TRUE,
                'title' => 'title'
            ],
            'content' => [
                'name' => 'password',
                'type' => 'textarea',
                'placeholder' => 'Lorem ipsum dolar sit amet...',
                'description' => 'Content of post.',
                'required' => TRUE,
                'title' => 'content'
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
        //TODO: Validate password & username
        return TRUE;
    }
    
    public function submit(array $data) : bool {
        return TRUE;
    }
}
