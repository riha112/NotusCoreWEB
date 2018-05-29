<?php
namespace Notus\Modules\Block;

use Siler\{Dotenv, Twig};
use Notus\Modules\Twig\TwigUtil;

class BlockController implements BlockInterface
{
    private $renderedOutput;

    public function __construct(){
        $this->renderBlock();
    }

    public function getID() : string {
        return 'notus-block';
    }

    public function getTemplatesName() : string {
        return 'block';
    }

    //Returns block/[].twig or block/id/[].twig
    private function getPathToTemplate(string $name) : string {
        return TwigUtil::getPathToTemplate('_custom/block/', $this->getID(), $name);
    }

    protected function canView() : bool{
        return TRUE;
    }

    protected function getBlocksData() : array {
        return [];
    }

    private function renderBlock() : void {
        if(!$this->canView()) return;
        $data = $this->getBlocksData();
        $path = $this->getPathToTemplate($this->getTemplatesName());
        $render = Twig\render($path, $data);
        $this->renderedOutput = $render;
    }

    public function getOutput() : string {
        return $this->renderedOutput;
    }

}

