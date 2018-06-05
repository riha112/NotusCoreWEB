<?php
namespace Notus\Modules\Table;
use Notus\Modules\Message\MessageController as MSG;

class DatabaseTableController extends TableController
{
    // TODO: Pass database table name, fields + maybe savable?
    public function getQuerySettings() : ?array {
        return [
            /*'table' => 'table_name',
            'columns' => [
                'table_column_name_1',
                'table_column_name_2'                
            ],
            'condition' => [
                'OR' => [
                    'table_column_name_1[>]' => 50 //[>], [>=], [!], [><], [<>] // More at https://medoo.in/api/where
                    'table_column_name_2' => 12
                ]
            ]*/
        ];
    }

    protected function getDatabaseData() : array {
        try{
            $settings = $this->getQuerySettings();
            $table = $settings['table'] ?? '';
            $columns = $settings['columns'] ?? [];
            $condition = $settings['condition'] ?? [];

            global $database;
            $data = $database->select($table, $columns, $condition);
            //var_dump([$table, $columns, $condition]);
            return $data[0];
        }catch(Exception $e){
            MSG::addErrorMessage(['message' => $e->getMessage()]);
            return [];
        }
    }

    public function getTableData() : array{
        $data = parent::getTableData();
        $data = $this->getDatabaseData();
        return $data;
    }
}
