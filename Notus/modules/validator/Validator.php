<?php
namespace Notus\Modules\Validator;
use Notus\Modules\Message\MessageController as MSG;
class Validator
{
    private static $addToMessanger = false;
    /**
     * @return array['is_valid' => bool, 'msg' => string]
     */
    public static function validate(array $data, array $rules, bool $addToMessanger = false) : array {
        $overview = ['is_valid' => TRUE, 'msg' => []];
        self::$addToMessanger = $addToMessanger;
        foreach ($rules as $field => $rule) {

            if(!isset($rule["validator"])) continue;
            else $rule = $rule["validator"];

            $isRequired =  $rule['required'] ?? FALSE;
            if ($dataField = $data[$field] ?? FALSE) {

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
                        self::addMessage($overview, $field, "Contains unknown query");
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
                $minmax = self::validateMinMax($dataField, $rule);
                if ($minmax !== TRUE) {
                    $overview['is_valid'] = FALSE;    
                    self::addMessage($overview, $field, "Length " . $minmax);                
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
            if(in_array(\strtolower($charset), ['integer', 'decimal'])){
                $num = (float) $text;
            }
        }
        $result = TRUE;
        if($isMin && $num < $isMin){
            $result = "too short. Min " . $isMin;
        }
        if($isMax && $result && $num > $isMax){
            $result = "too long. Max " . $isMax;
        }
        return $result;

    }

    private static function validateCharset(string $text, string $charset) {
        switch (\strtolower($charset)) {
            case 'decimal':
                return self::isDecimal($text);
                break;
            case 'integer':
                return self::isInteger($text); 
                break;
            case 'email':
                return self::isEmail($text);
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
        if(self::$addToMessanger == TRUE){
            MSG::addErrorMessage(['message' => 'Field "'. $field . '": ' . $msg]);
        }
    }
}
