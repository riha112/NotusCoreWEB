<?php
namespace Notus\Modules\Table;

interface TableInterface
{
    public function getID() : string;
    public function getTableSettings() : array;
    public function getTableData() : array;
    public function getOutput() : string;
    public function getEmptyMessage() : string;
}
