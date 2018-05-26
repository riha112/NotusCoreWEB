<?php
namespace Notus\Modules\Table;

use Siler\{Dotenv, Twig};

class TableController implements TableInterface
{
    private $renderedOutput = NULL;

    public function __construct(){
        $this->renderTable();
    }

    public function getID() : string {
        return 'notus-table';
    }

    protected function isDark() : bool {
        return false;
    }

    public function getEmptyMessage() : string {
        return 'Nothing found!';
    }

    private function getPathToTemplate(string $name) : string {
        $uniquePath = "table/" . $this->getID() . "/$name.twig";

        $pathToFile = Dotenv\env('TEMPLATES') . $uniquePath;
        $fileExists = \file_exists($pathToFile);
        if ($fileExists) {
            return $uniquePath;
        }

        return "table/$name.twig";
    }

    private function renderTable() : void {        
        $data = $this->getConvertedTableData();
        $path = $this->getPathToTemplate('table');
        $render = Twig\render($path, $data);
        $this->renderedOutput = $render;
    }

    public function getTableSettings() : array {
        // TODO: implement : searching, sorting, pager
        return [
            'searchable' => FALSE,
            'sortable' => FALSE,
            'pager' => FALSE,
        ];
    }

    private function getConvertedTableData() : array {
        $rawData = $this->getTableData();
        // TODO: rewrite ASAP.
        $header = \array_keys($rawData);
        for ($i = 0; $i < \sizeof($header); $i++) {
            for ($e = 0; $e < \sizeof($rawData[$header[$i]]); $e++) {
                $value = $rawData[$header[$i]];
                $body[$e][$i] = $value;
            } 
        }

        $outputData = [
            'head' => $header,
            'body' => $body,
            'id' => $this->getID(),
            'empty_msg' => $this->getEmptyMessage(),
            'dark' => $this->isDark(),
        ];

        return ['table' => $outputData];
    }

    /* ['column-title' => [ 'col-1, row-1', 'col-1, row-2', 'exc..' ]]*/
    public function getTableData() : array {
        return [];
    }
    
    public function getOutput() : string{
        return $this->renderedOutput | '';
    }
}
