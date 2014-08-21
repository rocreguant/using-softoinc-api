<?php

class ErrorController extends AbstractController {

    public function run() {
        // Instanciar model de categories
        // Demanar les categories
        // Assignar-les a la vista
        
        $this->view->display( 'error.tpl' );
    }

}