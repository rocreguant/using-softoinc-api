<?php

/**
 * Description of router
 *
 * @author lcfib
 */
class RouterClass {

    private static $instance = false;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new RouterClass();
        }

        return self::$instance;
    }

    public function resolveRequest(RequestClass $request) {
        $controllerName = 'ErrorController';

        $url = $request->getUrl();

        $array = explode( '/', $url);
        
        $first_directory = $array[1];
        
        switch ( $first_directory ) {
            case '':
            case 'index':
                $controllerName = 'IndexController';
                break;
            case 'program':
                $controllerName = 'ProgramController';
                break;
            case 'login':
                $controllerName = 'LoginController';
                break;
            case 'search':
                $controllerName = 'SearchController';
                break;
        }
        
        $request->setControllerName($controllerName);
    }

}
