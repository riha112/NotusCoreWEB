<?php
namespace Notus\Modules\Render;
interface Renderable 
{
    public function getID() : string;    
    public function getRenderArray() : array;
    public function getRenderTemplate() : string;
}