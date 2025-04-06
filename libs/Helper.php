<?php
/**
 * Description of Help
 *
 * @author YONY ACEVEDO
 */
class Helper{
    
    function __construct() {
        

    }
    
    public function fixDate($date,$format='d/m/Y'){
        $d = explode("-", $data);
        return $d[2]."/".$d[1]."/".$d[0];
    }
    
    public function strspacecase($slug)
    {
        return str_replace("_", " ", $slug);
    }
    
    public function compare_array_assoc($array1, $array2)
    {
        $difference = NULL;
        foreach($array1 as $key => $value)
        {
            if(is_array($value))
            {
                if(!array_key_exists($key, $array2))
                {
                    $difference[$key] = $value;
}
                elseif(!is_array($array2[$key]))
                {
                    $difference[$key] = $value;
                }
                else
                {
                    $new_diff = compare_array_assoc($value, $array2[$key]);
                    if($new_diff != FALSE)
                    {
                        $difference[$key] = $new_diff;
                    }
                }
            }
            elseif(!array_key_exists($key, $array2) || $array2[$key] != $value)
            {
                $difference[$key] = $value;
            }
        }
        return !isset($difference) ? 0 : $difference;
    }
    
    public function chmodR($path, $filemode) {
    
        try {
            
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST); 
            $flag = false;
            
            foreach($iterator as $key => $item) {
                
                $items['files'][] = $key;
                $items['files']['permission'][] = array($key => substr(sprintf('%o', fileperms($key)), -4));
                
                if (!is_dir($key)){
                    // Establecer el usuario
                    if(is_bool(chown($key, exec('whoami'))) == true && is_bool(chmod($key, $filemode)) == true && $flag == false){
                        
                        $items['files']['chown'][] = chown($key, exec('whoami'));
                        $items['files']['chmod'][] = chmod($key, $filemode);
                    
                    }else {
                        
                        return false;
                        
                    }

                }
                
            } 

            return true;
            
        } catch (Exception $e) {
            
            return $e->getMessage();
            
        }
    } 
    
}