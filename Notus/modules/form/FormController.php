<?php
namespace Notus\Modules\Form;

use Siler\{Twig, Http, Dotenv};

class FormController implements FormInterface
{
    private $renderedOutput = NULL;

    public function __construct(array $data = []){
        $isSubmitted = $this->isSubmitted();
        \var_dump($isSubmitted);
        if($isSubmitted){
            $data = $_POST;
            $isValid = $this->validate($data);            
            if($isValid){
                $this->submit($data);
                unset($_POST);
                Http\redirect(Http\url());
            }
        }else if($this->renderedOutput === NULL){
            $renderArray = $this->getRenderer($data);
            $this->renderedOutput = $this->getRenderedForm($renderArray);
        }
    }

    public function getOutput() : string{
        return $this->renderedOutput | ' ';
    }

    private function isSubmitted() : bool {
        $formID = $this->getID();
        return isset($_POST['form']) && $_POST['form'] == $formID;
    }

    //Returns page/[].twig or page/id/[].twig
    private function getPathToTemplate(string $name) : ?string {
        $uniquePath = "form/" . $this->getID() . "/$name.twig";

        //TODO: maybe recursive
        $pathToUniqueFile = Dotenv\env('TEMPLATES') . $uniquePath;
        $fileExistsUnique = \file_exists($pathToUniqueFile);
        if ($fileExistsUnique) {
            return $uniquePath;
        } else {
            $pathToFile = Dotenv\env('TEMPLATES') . "form/$name.twig";
            $fileExists = \file_exists($pathToFile);
            if($fileExists){
                return "form/$name.twig";
            }
        }
        return NULL;
    }

    private function getRenderedForm(array $data) : string {
        $renderedFields = $this->getRenderedFields($data);
        //Renders form
        $templatePath = $this->getPathToTemplate('form');
        $formData = $this->getFormData();
        $formData['fields'] = $renderedFields;
        $output = Twig\render($templatePath, $formData);
        return $output;
    }

    protected function getFormData() : array{
        return [
            'form' => [
                'id' => $this->getID(),
                'method' => 'POST',
                'todo' => 'Fill empty fields!'
            ],
            'fields' => [],

        ];
    }

    private function getRenderedFields(array $data) : array {
        $renderedFields = [];
        foreach ($data as $fieldName => $fieldData) {
            $newFieldData = [ 'field' => $fieldData ];
            $renderedField = $this->getRenderedField($newFieldData);
            array_push($renderedFields, $renderedField);
        }
        return $renderedFields;
    }

    private function getRenderedField(array $fieldData) : string {
        $templatePath = $this->getFieldsTemplatesPath($fieldData['field']['type'] ?? 'text');
        $output = Twig\render($templatePath, $fieldData);
        return $output;
    }

    private function getFieldsTemplatesPath(string $type) : ?string {
        if($uniquePath = $this->getPathToTemplate("form.field-$type")){
            return $uniquePath;
        }
        return $this->getPathToTemplate("form.field");
    }

    public function getID() : string {
        return "notus-form";
    }
    public function getRenderer(array $data) : array {
        return [];
    }
    public function validate(array &$data) : bool {
        // TODO: Write default validation for all field types
        return TRUE;
    }
    public function submit(array $data) : bool {
        return TRUE;
    }

}
