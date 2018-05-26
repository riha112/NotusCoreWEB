<?php
namespace Notus\Modules\Menu;
use Siler\{Dotenv, Twig};
use Notus\Modules\Twig\TwigUtil;

class Menu
{
    private $data;

    public function load($id) : void {
        $this->setData($id);
        $this->data = self::buildTree($this->data);
    }

    private function setData($id) {
        try{
            $table = 'menu_item';
            $columns = ['id', 'title', 'url', 'description', 'parent', 'depth', 'created', 'status'];
            $condition = ['menu_id' => $id];

            global $database;
            $this->data = $database->select($table, $columns, $condition);
        }catch(Exception $e){
            MSG::addErrorMessage(['message' => $e->getMessage()]);
            return [];
        }
    }

    private static function buildTree(array $data) : array{
        $uri = $_SERVER['REQUEST_URI'];
        $tree = [];
        foreach ($data as $element) {
            $parent = $element['parent'];
            $depth = $element['depth'];
            $menuItem = new MenuItem($element);
            $element['rendered'] = $menuItem->getOutput();
            if(\strpos("/NotusCore" . $element['url'], $uri) === 0){
                $element['is_active'] = TRUE;
            }
            $tree[$parent][$depth] = $element;
        }
        return $tree;
    }

    private static function getMachineName(string $name) : string {
        $illegals = [
            " ", ":", ";", "!", ".", ">", "<", "?", "/", "[", "]",
            "+", "=", ")", "(", "*", "&", "^", "%", "$", "#", "@",
            "{", "}", "~", "`", '"', "'"
        ];
        $machineName = \str_replace($illegals, "_", $name);
        return $machineName;
    }

    private function getPathToTemplate($machineName) : string {
        return TwigUtil::getPathToTemplate('menu/', $machineName , "menu");
    }

    public function getOutput() {
        $machineName = self::getMachineName($data['title'] ?? "");
        $path = $this->getPathToTemplate($machineName);
        $renderData = ['menu' => [
            'items' => $this->data,
            'machine_name' => $machineName,
        ]];
        $render = Twig\render($path, $renderData);
        return $render;
    }

}
