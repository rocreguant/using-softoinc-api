<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Request
 *
 * @author lcfib
 */
class RequestClass {
    private static $instance = false;
    private $url;

    private $controllerName;
    
    private function __construct() {}
    
    public static function getInstance() {
        if (!self::$instance) {
        self::$instance = new RequestClass();
        }
        return self::$instance;
    }
    
    public function setUrl($url){
        $this->url=$url;
    }
    
    public function getUrl(){
        if (null === $this->url)
        {
            $this->setUrl( $_SERVER['REQUEST_URI'] );
        }
        return $this->url;
    }

    public function setControllerName($controllerName){
        $this->controllerName = $controllerName;
    }
    
    public function getControllerName(){
        return $this->controllerName;
    }
    
}
