<?php
namespace Notus\App\Forms\Forum;

use Notus\Modules\{Form, User, File, Forum, Message\MessageController as MSG};

class NewPostForm extends Form\FormController
{
    private $postID;
    
    public function __construct(array $data = [], array $vars=[]){
        if(isset($_GET["post"])){
            $postID = $_GET["post"];
        }
        parent($data, $vars);
    }

    public function getID() : string {
        return parent::getID() . '-loaded-post';
    }

    protected function getFormData() : array {
        $data = parent::getFormData();
        $data['form']['title'] = 'EDIT_POST_FORM';
        $data['form']['top_description'] = 'set loaded_post as Post:';
        $data['form']['bottom_description'] = ';';
        return $data;
    }

    public function getRenderer(array $data) : array {
        $post = new Forum\Post();
        $post->_init($this->postID);
        $data = [
            'title' => [
                'title' => 'title',
                'type' => 'text',
                'placeholder' => 'How to make post?',                
                'description' => 'Title of post.',
                'value' => $post
                'validator' => [
                    'required' => TRUE,
                    'max' => '128',
                ]
            ],
            'content' => [
                'title' => 'content',
                'type' => 'textarea',
                'placeholder' => 'Lorem ipsum dolar sit amet...',
                'description' => 'Content of post.',
                'validator' => [
                    'required' => TRUE,
                ],
            ],
            'category' => [
                'title' => 'type',
                'type' => 'select',
                'options' => [
                    '1' => 'bug',
                    '2' => 'feature',                    
                ],
                'validator' => [
                    'required' => TRUE,
                ]
            ],
            'is_published' => [
                'title' => 'is_published',
                'type' => 'checkbox',
                'description' => 'Publish?'
            ],
            'submit' => [
                'name' => 'submit',
                'type' => 'submit',
                'value' => '>> run'
            ]
        ];
        return $data;
    }
    
    public function submit(array $data) : bool {
        Forum\Post::changeContent($this->postID, $data);

        return TRUE;
    }
}
