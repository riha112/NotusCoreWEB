<?php
namespace Notus\Modules\Riha;

class RihaCompiler{
    private static $library = [
        'global' => [
                'GUI', 'MEMORY', 'DATA', 'TRUE', 'FALSE', 'USER', 'WORLD', 'OBJECT', 'API', 'INPUT'
        ],
        'action' => [
                'scope', 'print', 'end', 'set', 'define', 'loop', 'return', 'import', '->', 'as', 'of', 'check'
        ],
        'data_type' => [
                'boolean', 'text', 'number', 'array', 'gui', 'object', 'user', 'void', 'function', 'file', 'lambda', 'object'
        ],
        'condition' => [
            'if', 'else', 'in', 'from', 'to', 'while', 'not', 'is', 'by', 'or', 'and', 'under', 'over', 'elseif', 'contains'
        ],
        'bracket' => [
            '(', ')', '[', ']', '{', '}'
        ],
        'number' => [
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
        ],
        'variable' => [

        ]
    ];

    private static function strpos_all($haystack, $needle) {
        $offset = 0;
        $allpos = array();
        while (($pos = strpos($haystack, $needle, $offset)) !== FALSE) {
            $offset   = $pos + 1;
            $allpos[] = $pos;
        }
        return $allpos;
    }

    public static function render( string $fileName, array $variables = [] ) : string {

        $cacheUrl = __DIR__ . '//cache//' . $fileName . '.rih';
        if(file_exists($cacheUrl)){
            $data = file_get_contents($cacheUrl);
            return $data;
        }

        $fileUrl = __DIR__ . '//codes//' . $fileName . '.rih';
        $data = file_get_contents($fileUrl);
        $variables[] = 'Length';
        self::$library['variable'] = $variables;
        $data = str_replace('    ', "<span class='tab'>&nbsp;</span>", $data);

        $lines = preg_split ('/$\R?^/m', $data);

        for ($l = 0; $l < sizeof($lines); $l++) {
            $line = $lines[$l];
            $clearLine = str_replace('<span class="tab">&nbsp;</span>', '', $line);
            $clearLine = str_replace(':', '', $line);            
            $words = explode(" ", $clearLine);

            $locations = array_keys($words,'as');
            foreach ($locations as $loc) {
                $type = $words[$loc + 1];
                if($loc > 0){                
                    if($type == 'file'){
                        self::$library['global'][] = $words[$loc - 1];
                    }else{
                        self::$library['variable'][] = $words[$loc - 1];
                    }
                }

            }

            $id = strpos($line, '"');
            $opened = FALSE;
            while($id !== FALSE){
                $opened = !$opened;
                $line_left = substr($line, 0, $id);
                $line_right = substr($line, $id + 1, strlen($line));   
                $template = '<span class="ddd--s-t-r-i-n-g--ddd">"';
                if(!$opened){
                    $template = '"</span>';
                }
                $line = $line_left . $template . $line_right;
                $offset = strlen($template);

                $id = strpos($line, '"', $id + 1 + $offset);
            }
            if($opened){
                $line .= '</span>';
            }
            $lines[$l] = $line;
        }

        

        foreach ($lines as &$line) {
            foreach (self::$library as $class => $dictionary) {
                $template = "<span class='$class'>%s</span>";
                foreach ($dictionary as $word) {            
                    $substitute = sprintf($template, $word);
                    if(in_array($class, ['number', 'bracket']) === FALSE){
                        $original = preg_quote($word, '/');
                        $line = preg_replace('/\b'.$original.'\b/', $substitute, $line);
                    }else{
                        $line = str_replace($word, $substitute, $line);
                    }
                    
                }
            }
        }  

        $isText = FALSE;
        for ($l = 0; $l < sizeof($lines); $l++) {
            $line = $lines[$l];
            $clearLine = str_replace("<span class='tab'>&nbsp;</span>", '', $line);
            if(!$isText){
                
                if(substr($clearLine, 0, 2) == '//'){
                    $lines[$l] = "<span class='comment'>" . $line . "<span>";
                }elseif(substr($clearLine, 0, 9) == '--start--'){
                    $isText = TRUE;
                }
            }
            
            if($isText){
                $lines[$l] = "<span class='string'>" . $line . "<span>";                
                if(substr($clearLine, 0, 7) == '--end--'){
                    $isText = FALSE;
                }
            }
        }

        try{
            if($lines[sizeof($lines) - 1] == $lines[sizeof($lines) - 2]){
                $lines[sizeof($lines) - 1] = "";
            }
        }catch(Exception $e){
            $lines[] = ' ';
        }

        $rowTemplate = "<div class='row'>%s</div>";
        $output = '<div class="terminal"><div class="code">';
        for ($l = 0; $l < sizeof($lines); $l++) {
            $line = $lines[$l];
                if($l == sizeof($lines) - 1 && $line ==$lines[$l - 1]){
                    $line = "";
                }
                $output.= sprintf($rowTemplate, $line);
        } 
        $output .= '</div></div>';
       // echo $output;

        $pathToFile = $cacheUrl;
        $fileName = basename($pathToFile);
        $folders = explode('/', str_replace('/' . $fileName, '', $pathToFile));

        $currentFolder = '';
        foreach ($folders as $folder) {
            $currentFolder .= $folder . DIRECTORY_SEPARATOR;
            if (!file_exists($currentFolder)) {
                mkdir($currentFolder, 0755);
            }
        }

        $myfile = fopen($cacheUrl, "w") or die("Unable to open file!");
        fwrite($myfile, $output);
        fclose($myfile);
      
        return $output;
    }

    public static function print_rr($value){
        echo '<pre>';
        var_dump($value);
        echo '</pre>';                
    }
}
