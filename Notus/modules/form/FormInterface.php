<?php
namespace Notus\Modules\Form;

interface FormInterface{
    public function getID() : string;
    public function getRenderer(array $data) : array;
    public function validate(array &$data) : bool;
    public function submit(array $data) : bool;
}
