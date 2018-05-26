<?php

class File
{
    private $id;
    private $type;
    private $format;    
    private $size;
    private $location;
    private $added;
    private $name;
    private $author;

    public function __construct(array $data = [])
    {
        $id = $data['id'] ?? 0;
        $type = $data['type'] ?? 'unknown';
        $format = $data['format'] ?? '.null';
        $size = $data['size'] ?? 0;       
        $location = $data['location'] ?? '/';
        $added = $data['added'] ?? null;
        $name = $data['name'] ?? null;
        $author = $data['author'] ?? null;   
    }

    public function getID() : int {
        return $this->id;
    }

    public function getType() : string {
        return $this->type;
    }
}