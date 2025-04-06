<?php
/**
 * Description of html
 *
 * @author yony
 */
class Html {
    
    public function __construct() {

    }

    public function __callStatic($name, $arguments) {
        $content = isset($arguments[0]) ? $arguments[0] : null;
        $attributes = isset($arguments[1]) ? $arguments[1] : array();

        return '<'.$name.self::parseAttributes($attributes).'>'.$content.'</'.$name.'>';
    }

    public function script($src, array $attributes = array(), $defer = true){
        $attributes['type'] = 'text/javascript';
        $attributes['src'] = strstr($src, '://') ? $src : SITE_URL . $src;
        if($defer){
            $attributes['defer'] = 'defer';
        }

        return '<script'.self::parseAttributes($attributes).'></script>';
    }
    
    public function favicon($src, array $attributes = array()){
        $attributes['href'] = strstr($src, '://') ? $src : URL . $src;
        return '<link '.self::parseAttributes($attributes).'/>';
    }
    
    public function stylesheet($src, array $attributes = array()){
        $attributes['type'] = 'text/css';
        $attributes['href'] = strstr($src, '://') ? $src : SITE_URL . $src;
        $attributes['rel'] = 'stylesheet';

        return '<link '.self::parseAttributes($attributes).'/>';
    }

    public function image($src, array $attributes = array()){
        return '<img src="' . $src . '" '.self::parseAttributes($attributes).' />';
    }
    
    public function link($label, array $attributes = array()){
        
        if(isset($attributes['action']) && !empty($attributes['action'])){
            
            $attributes['url']=$attributes['controller'].'/'.$attributes['action'];
            
            if(isset($attributes['params']) && !empty($attributes['params'])){
                $attributes['url'].= '/'.rtrim(implode('/', $attributes['params']), ',');
            }
            
        }else {
            
            $attributes['url']=$attributes['controller'];
        }
        
        if(substr($attributes['href'], 0, 1)!=="#" && $attributes['href']!=="javascript:void(0)"){
        $attributes['href'] = strpos($attributes['url'], '://') === false ? URL.$attributes['url'] : $attributes['url'];
        }
        
        return '<a '.self::parseAttributes($attributes).'>'.$label.'</a>';
    }
    
    public function form(array $attributes = array()){
    /*
    application/x-www-form-urlencoded 	Todos los caracteres se codifican antes de enviados (los espacios se convierten en símbolos "+" y los caracteres especiales se convierten en valores ASCII HEX)
    multipart/form-data 	No se codifican caracteres. Este valor es necesario cuando se utilizan formularios que tienen un control de carga de archivos
    text/plain 	Los espacios se convierten en símbolos "+", pero no se codifican caracteres especiales
    */
    $form='<form '.self::parseAttributes($attributes).' >';

        if(isset($attributes['csrfToken']) && !empty($attributes['csrfToken'])){
          $form.='<input type="hidden" name="'.$attributes['name'].'-csrf-token" value="'.$attributes['csrfToken'].'"/>';
        }
        
        return $form;
    }

    public function submiteForm(array $attributes = array()){
        $button = '<button '.self::parseAttributes($attributes).'>'.$attributes['label'].'</button>';
        return $button;
    }
    
    public function endForm(){
        return '</form>';
    }
    
    public function tags($name, $tags, $value = null, array $attributes = array()){
        $attributes['name'] = $name;
        $tags = '<'.$tags.' '.self::parseAttributes($attributes).'>'.$value.'</'.$tags.'>';
        return $tags;
        
    }
    
    public function input($name, $type, $value = null, array $attributes = array(), $div = true){
        $attributes['name'] = $name;

        if($name === null){
            $div = '';
        }else{
            if($value === null && $type != 'password'){
                $value = \Input::data($name);
            }

            if($div){
                $div = '<div class="'.$name.' Field-Error">'.\Input::getValidationErrors($name).'</div>';
            }
        }

        switch($type){
            case 'textarea':
                $input = '<textarea '.self::parseAttributes($attributes).'>'.$value.'</textarea>';
                break;

            case 'button':
                $input = '<button '.self::parseAttributes($attributes).'>'.$value.'</button>';
                break;
            
            case 'select':
                if(is_array($value)){
                    if(isset($attributes['default']) && is_array($attributes['default']) && !empty($attributes['default'])){
                        $options = '<option value="'.$attributes['default']['value'].'" selected="selected">'.$attributes['default']['option'].'</option>';
                    }else{
                        $options = '<option value="" selected="selected">'.$attributes['placeholder'].'</option>';
                    }
                    
                    foreach($value as $key => $option){
                        $options .= '<option value="'.$option['id'].'">'.$option['description'].'</option>';
                    }
                    $input = '<select '.self::parseAttributes($attributes).'>'.$options.'</select>';
                }
                break;

            default:
                $attributes['type'] = $type;
                $attributes['value'] = $value;
                $input = '<input '.self::parseAttributes($attributes).'/>';
        }

        return $div.$input;
    }

    public function parseAttributes($attributes){
        foreach($attributes as $attribute => $value){
            $attributes[$attribute] = ' '.$attribute . '="'.$value.'"';
        }

        return join('', $attributes);
    }

    public function sanitize($string, $flag = ENT_QUOTES, $encoding = 'UTF-8'){
        return htmlspecialchars($string, $flag, $encoding);
    }

    public function formatDate($date, $from_format = 'd/m/Y', $to_format = 'Y-m-d') {
        
        $date = date('m/d/Y',strtotime($date));

        return $date;
    }

    public function formatDateResum($date, $from_format = 'd/m/Y', $to_format = 'Y-m-d') {
        
        $date = date('d/m/Y',strtotime($date));

        return $date;
    }
}
