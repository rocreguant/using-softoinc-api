<?php

class MvcClass {

    private static $instance;
    private $router;
    /* @var RequestClass */
    private $request;

    private function __construct() {
        $this->router = RouterClass::getInstance();
        $this->request = RequestClass::getInstance();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new MvcClass();
        }

        return self::$instance;
    }

    public function run() {

        $this->router->resolveRequest($this->request);

        $controller_name = $this->request->getControllerName();
        $controller = new $controller_name();
        $controller->setRequest($this->request);
        try {
            $controller->run();
        }
        catch ( Exception $e)
        {
            $controller = new ErrorController();
            $controller->setRequest($this->request);
            $controller->run();
        }
    }

}

?>
