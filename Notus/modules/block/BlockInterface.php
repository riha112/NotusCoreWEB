<?php
namespace Notus\Modules\Block;

interface BlockInterface{
    public function getID() : string;
    public function getTemplatesName() : string;
    public function getOutput() : string;
}
