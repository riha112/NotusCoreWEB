<?php
namespace Notus\App\Forms\Authentication;

class Validator
{
    /**
     * @return array['is_valid' => bool, 'msg' => string]
     */
    public static function validate(array $data, array $rules) : array {
        $overview = ['is_valid' => TRUE, 'msg' => []];
        foreach ($rules as $field => $rule) {

            $isRequired =  $rule['required'] ?? FALSE;

            if ($dataField = $data[$field]) {

                // Required
                if (empty($dataField)){
                    if ($isRequired) {
                        self::addMessage($overview, $field, "Required");
                    } else {
                        continue;
                    }
                }

                // Validates equal
                if (isset($rule['equal'])) {
                    if ($dataField != $rule['equal']) {
                        self::addMessage($overview, $field, "Not equal to: " . $rule['equal']);
                    }
                } elseif (isset($rule['strict_equal']) && $dataField !== $rule['strict_equal']) {
                    self::addMessage($overview, $field, "Not equal to: " . $rule['strict_equal']);
                }

                // Validates one of
                $oneOffLibrary = $rule['one_of'] ?? FALSE;
                if ($oneOffLibrary !== FALSE && !\in_array($dataField, $oneOffLibrary)) {
                    $msg = \sprintf("Not equal to:[%s]", join(", ", $oneOffLibrary));
                    self::addMessage($overview, $field, $msg);
                }

                // Validates charset
                if (isset($rule['charset'])) {
                    if (self::validateCharset($dataField, $rule['charset'])) {
                        
                    } else {
                        self::addMessage($overview, $field, "Illegal characters detected");
                        // TODO: Character error
                    }
                }

                // Validate illegal
                $illegalLibrary = $rule['cant_contain'] ?? FALSE;
                if($illegalLibrary !== FALSE){
                    foreach($illegalLibrary as $illegal){
                        if(\strpos($dataField, $illegal) !== FALSE){
                            $msg = \sprintf("Can't contain:[%s]", join(", ", $illegalLibrary));
                            self::addMessage($overview, $field, $msg);
                            break;
                        }
                    }
                } 

                // Validates Min Max
                if (!self::validateMinMax($dataField, $rule)) {
                    $overview['is_valid'] = FALSE;    
                    self::addMessage($overview, $field, "Length");                
                    // TODO: Min Max error
                }

                // Validate Regex
                $regex = $rule['regex'] ?? FALSE;
                if($regex !== FALSE && !self::isRegex($dataField, $regex)){
                    self::addMessage($overview, $field, "Not matching pattern");                
                }

                //Validate Format
                $format = $rule['format'] ?? FALSE;
                if ($format == 'uppercase') {
                    if(!\strtoupper($dataField) === $dataField){
                        self::addMessage($overview, $field, "Must be uppercase");                
                    }
                } elseif ($format == 'lowercase' && !\strtolower ($dataField) === $dataField) {
                    self::addMessage($overview, $field, "Must be lowercase");                
                }

            } elseif ($isRequired === TRUE) {
                self::addMessage($overview, $field, "Required");
            } 
        }
        return $overview;
    }

    // Min/Max
    private static function validateMinMax(string $text, array $rules) {

        $isMin = $rules['min'] ?? FALSE;
        $isMax = $rules['max'] ?? FALSE;

        if(!$isMin && !$isMax){
            return TRUE;
        }

        $num = \strlen($text);

        $charset = $rules['charset'] ?? FALSE;
        if($charset){
            if(in_array(\strtolower($charset), 'integer', 'decimal')){
                $num = (float) $text;
            }
        }

        $result = TRUE;
        if($isMin){
            $result = ($num >= $isMin);
        }
        if($isMax && $result){
            $result = ($num <= $isMax);
        }
        return $result;

    }

    private static function validateCharset(string $text, string $charset) {
        switch (\strtolower($charset)) {
            case 'decimal':
                break;
            case 'integer':
                break;
            case 'email':
                break;
            default:
                return TRUE;
        }
    }

    // Numerics
    private static function isDecimal(string $text) : bool {
        return is_numeric($text);

    }
    private static function isInteger(string $text) : bool {
        return filter_var($text, FILTER_VALIDATE_INT) !== FALSE;
    }

    private static function isEmail(string $text) : bool {
        return filter_var($text, FILTER_VALIDATE_EMAIL) !== FALSE;
    }

    private static function isRegex(string $text, string $regex) {
        return preg_match($regex, $text);
    }

    private static function addMessage(array &$output, string $field = '', string $msg = '') : void {
        $output['is_valid'] = FALSE;
        $output['msg'][$field][] = $msg;
    }
}
