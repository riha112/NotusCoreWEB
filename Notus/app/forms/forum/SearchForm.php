<?php
namespace Notus\App\Forms\Forum;

use Notus\Modules\{Form, User, Message\MessageController as MSG};

class SearchForm extends Form\FormController
{
    public function getID() : string {
        return parent::getID() . '-search';
    }

    protected function getFormData() : array {
        $data = parent::getFormData();
        $data['form']['method'] = "GET";
        $data['form']['top_description'] = 'set new_query as Filter:';
        $data['form']['bottom_description'] = ';';
        return $data;
    }

    protected function done() : void {}

    public function getRenderer(array $data) : array {
        $data = [
            'title' => [
                'name' => 'filter',
                'type' => 'text',
                'limit' => '999',
                'placeholder' => 'Search...',
                'value' => $_GET['filter'] ?? "",                
                'description' => 'Search query',
                'title' => 'search_query'
            ],
            'type' => [
                'name' => 'type',
                'type' => 'select',
                'options' => [
                    '0' => '-',
                    '1' => 'bug',
                    '2' => 'feature'
                ],
                'title' => 'type'
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
