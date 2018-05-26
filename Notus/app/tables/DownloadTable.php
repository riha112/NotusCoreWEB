<?php
namespace Notus\App\Tables;

use Notus\Modules\Table\DatabaseTableController;

class DownloadTable extends DatabaseTableController
{
    private static $types = NULL;   

    public function getID() : string {
        return parent::getID() . "-download";
    }

    protected function isDark() : bool {
        return true;
    }

    public function getQuerySettings() : ?array {
        return [
            'table' => 'download_release',
            'columns' => [
                'title',
                'description',
                'type',
                'path',
                'created',
                'size'                
            ]
        ];
    }

    public function getTableData() : array{
        $data = parent::getTableData();
        $data = $this->getDatabaseData();
        self::formatData($data);

        return $data;
    }

    private static function formatData(array &$data){
        foreach ($data as $key => &$value) {
            if($value == NULL) $value = "--";
            else if($key == "created"){
                $date = date_create($value);
                $value = date_format($date, 'j. F Y');
            } else if($key == "size"){
                $value .= ' Mb';
            } else if($key == "path"){
                $value = self::getDownloadRenderer($value);
            } else if($key == "type"){
                $value = self::getType($value);                
            }
        }


        if(isset($data['path'])){
            $data['#'] = $data['path'];
            unset($data['path']);
        }
    }

    private static function getType(int $id): ?string{
        if(self::$types == NULL){
            self::populateTypes();
        }
        return self::$types[$id];
    }

    private static function populateTypes(){
        try{
            global $database;
            $data = $database->select('realease_type', ['id', 'title'], []);
            
            foreach ($data as $key => $value) {
                self::$types[$value['id']] = $value['title']; 
            }
        }catch(Exception $e){
            MSG::addErrorMessage(['message' => $e->getMessage()]);
            return [];
        }
    }

    private static function getDownloadRenderer($path){
        return \sprintf("<a class='download btn' href='%s'>Download</a>", $path);
    }
}
