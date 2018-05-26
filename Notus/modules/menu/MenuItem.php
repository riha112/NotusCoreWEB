<?php
namespace Notus\Modules\Menu;
use Siler\{Dotenv, Twig};
use Notus\Modules\Twig\TwigUtil;

class MenuItem
{
    private $data;

    public function __construct($data = []){
        $this->data = $data;
    }

    public function getTitle() : string {
        return $data['title'] ?? '';
    }

    public function getURL() : string {
        return $data['url'] ?? '';
    }

    public function getData() : array {
        return $this->data;
    }

    public function load($id) : void {
        $this->setData($id);
    }

    private function setData($id) {
        try{
            $table = 'menu_item';
            $columns = ['menu_id', 'title', 'url', 'description', 'parent', 'created', 'status'];
            $condition = ['id' => $id];

            global $database;
            $this->data = $database->select($table, $columns, $condition)[0];
        }catch(Exception $e){
            MSG::addErrorMessage(['message' => $e->getMessage()]);
            return [];
        }
    }

    private function getPathToTemplate() : string {
        return TwigUtil::getPathToTemplate('menu', "menu.item", "menu.item");
    }

    public function getOutput() : string {
        $path = $this->getPathToTemplate();
        $renderData = ['item' => $this->data];
        $render = Twig\render($path, $renderData);
        return $render;
    }

}
