<?php

class IndexController extends AbstractController {

    public function run() {
        // Instanciar model de categories
        // Demanar les categories
        // Assignar-les a la vista

        //$this->view = new ViewClass();
        
        $ch = curl_init( 'http://api2.softonic.com/es/latest_getHomeChoice/2.php?key=8f33a48c96dea8afafe5d48e3fdd1aa9');
	
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
	curl_setopt( $ch, CURLOPT_HEADER, 0 );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	$received_data = curl_exec( $ch );
	$formated_data = unserialize($received_data);
        $this->view->assign('homeChoice', $formated_data['choices']);
        $this->view->display( 'index.tpl' );
    }

}