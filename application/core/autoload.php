<?php

function __autoload($class_name) {
    
    preg_match('/(.+)(Class|Vista|Model|Controller)/i', $class_name, $result);
    
    if ( !empty($result))
    {
        
        $main = strtolower($result[1]);
        $path = PATH_BASE . '\\application\\';

        switch( $result[2]) {
            case 'Vista':
                require_once $path . 'vista\\' . $main . '.php';
                break;
            case 'Controller':
                require_once $path . 'controller\\' . $main . '.php';
                break;
            case 'Model':
                require_once $path . 'model\\' . $main . '.php';
                break;
            case 'Class':
                require_once $path . 'class\\' . $main . '.php';
                break;
            default:
                throw new Exception( 'Arxiu no existent' );
        }
    }
}

// Crida per problemes del autoload de Smarty
spl_autoload_register('__autoload'); 
