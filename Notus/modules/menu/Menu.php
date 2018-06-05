<?php
namespace Notus\Modules\Menu;
use Siler\{Dotenv, Twig};
use Notus\Modules\Twig\TwigUtil;
use Notus\Modules\User\Auth;
use \Exception as Exception;
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
            $condition = [
                "AND" => [
                    "menu_id" => $id,
                    "OR" => [
                        'output_type' => [0],
                    ],
                ]
            ];

            if(Auth::isAuthorized() !== FALSE){
                $condition["AND"]["OR"]["output_type"][] = 2;
            }else{
                $condition["AND"]["OR"]["output_type"][] = 1;
            }

            global $database;
            $this->data = $database->select($table, $columns, $condition);
        }catch(Exception $e){
            MSG::addErrorMessage(['message' => $e->getMessage()]);
            return [];
        }
    }

    private static function buildTree(array $data) : array{
        $tree = [];
        foreach ($data as $element) {
            $parent = $element['parent'];
            $depth = $element['depth'];
            $element["is_active"] = self::isActive($element["url"]);
            $menuItem = new MenuItem($element);
            $element['rendered'] = $menuItem->getOutput();
            $tree[$parent][$depth] = $element;
        }
        return $tree;
    }

    private static function isActive($path) : bool {
        $uri = $_SERVER['REQUEST_URI'];
        if(\strlen($path) <= 2 ) return FALSE;

        if($path[0] == '.'){
            $path = \substr($path, 1, 128);
        }

        return \strpos($uri, $path) !== FALSE;
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
