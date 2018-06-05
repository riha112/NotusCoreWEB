<?php
namespace Notus\App\Forms\Forum;

use Notus\Modules\{Form, User, File, Forum, Message\MessageController as MSG};

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
                'title' => 'title',
                'type' => 'text',
                'placeholder' => 'How to make post?',                
                'description' => 'Title of post.',
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
            'attachments' => [
                "name" => "attachment",
                "type" => "multi_file",
                "description" => "Attachments",
                "title" => "attachments",
                "max" => 10,
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
        $file_ids = [];
        $allowedTypes = ["riha", "txt", "png", "zip", "rar", "gif","jpg"];
        foreach ($_FILES as $file) {
            try{
                $name = bin2hex(random_bytes(12));
                $file_ids[] = File\FileController::upload($file, "attachments/$name",$allowedTypes);
            }catch(\Exception $e){
                MSG::addErrorMessage(["message" => $e->getMessage()]);
                return FALSE;
            }
        }

        $newPostData = [
            "author_id" => User\Auth::isAuthorized(),
            "title" => $data["title"],
            "content" => $data["content"],
            "type" => $data["category"],            
            "status" => isset($data["is_published"]) ? 1:0                                    
        ];

        Forum\Post::create($newPostData, $file_ids);

        return TRUE;
    }
}
