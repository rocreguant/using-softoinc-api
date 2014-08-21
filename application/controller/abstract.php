<?php

abstract class AbstractController {

    /** @var ViewClass */
    protected $view;

    /** @var RequestClass */
    protected $request;

    public function __construct() {
        $this->view = new ViewClass();
        
        $ch = curl_init( 'http://api2.softonic.com/es/latest_getHotSoftware/2.php?key=8f33a48c96dea8afafe5d48e3fdd1aa9&results=10');
	
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
	curl_setopt( $ch, CURLOPT_HEADER, 0 );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	$received_data = curl_exec( $ch );
	$formated_data = unserialize($received_data);
        $this->hotSoftware=$formated_data['programs'];
        $this->view->assign('programs', $this->hotSoftware);
    }

    public function setRequest(RequestClass $request) {
        $this->request = $request;
    }

    abstract public function run();
}