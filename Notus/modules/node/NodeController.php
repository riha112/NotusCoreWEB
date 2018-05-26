<?php

namespace Notus\Modules\Node;

class NodeController
{
    private static $renderedNode;

    public static function render() : string {
      return "";//  return static::
    }

    private static function getStructure( string $type ) : array {
        $structureJSON = self::loadStructureFile( $type );
        $data = [];
        return $data;
    }
    
    private static function loadStructureFile( string $type ) : string {
        return "";
    }

}