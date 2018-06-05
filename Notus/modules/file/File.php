<?php
namespace Notus\Modules\File;
use Siler\Dotenv;
class File
{
    private $id;
    private $type;
    private $size;
    private $location;
    private $added;
    private $name;
    private $author;

    public $rawData;

    public function __construct(array $data = [])
    {
        $this->id = $data['id'] ?? 0;
        $this->type = $data['type'] ?? 'unknown';
        $this->size = $data['size'] ?? 0;       
        $this->location = $data['url'] ?? '/';
        $this->added = $data['created'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->author = $data['author_id'] ?? null;   

        $this->rawData = [
            "id" => $this->getID(),
            "type" => $this->getType(),
            "size" => $this->getSize(),
            "location" => $this->getLocation(),
            "created" => $this->getCreationTime(),
            "name" => $this->getName(),
            "author_id" => $this->getAuthor()
        ];
    }
    public function getID() : ?int {
        return $this->id;
    }

    public function getType() : ?string {
        return $this->type;
    }

    public function getSize() : ?string {
        return $this->size;
    }

    public function getLocation() : ?string {
        return Dotenv\env('FILE_PATH') . $this->location;
    }

    public function getCreationTime() : ?string {
        return $this->added;
    }

    public function getName() : ?string {
        return $this->name;
    }

    public function getAuthor() : ?int {
        return $this->author;
    }
}
