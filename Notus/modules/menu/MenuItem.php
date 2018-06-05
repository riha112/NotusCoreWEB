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
            $result = $database->select($table, $columns, $condition);
            if(\sizeof($result) > 0){
                $result = $result[0];
                $result["is_active"] = self::isActive($result["url"]);
                $this->data = $result;
            }
        }catch(Exception $e){
            MSG::addErrorMessage(['message' => $e->getMessage()]);
            return [];
        }
    }

    private static function isActive($path) : bool {
        $uri = $_SERVER['REQUEST_URI'];
        if(\strlen($path) <= 0 ) return FALSE;

        if($path[0] == '.'){
            $path = \substr($path, 1, 128);
        }

        return \strpos($uri, $path) !== FALSE;
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
