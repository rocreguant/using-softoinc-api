<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of search
 *
 * @author lcfib
 */
class SearchModel {
    //private $params;
    private $formated_data;
    private $next;
    private $platforms;
    private $categoty;
    
    public function __construct() {}
    
    
    public function runPlatforms(){
        $data = $this->apiCall('http://api2.softonic.com/en/section_getPlatforms/2.php?key=8f33a48c96dea8afafe5d48e3fdd1aa9');
        $data=unserialize($data);
        $this->platforms = $data['platforms'];
    }
    
    public function runCategory(){
        $data = $this->apiCall('http://api2.softonic.com/en/section_getChildren/'.$_GET['category'].'.php?key=8f33a48c96dea8afafe5d48e3fdd1aa9');
        $this->category = unserialize($data);
    }
    
    public function apiCall($url){
        $ch = curl_init($url);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
        curl_setopt( $ch, CURLOPT_HEADER, 0 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        $data = curl_exec( $ch );
        return $data;
    }
    
    public function run(){
        /*
         * $params[0]=search
         * $_GET['program']=coses a buscar, separat per +
         * $_GET['pag']=pagina on estic
         */
        //filtrar l'imput!!
        //$programes=str_replace(' ', '+', $_GET['program']);

        
        $this->runPlatforms();
        //runCategory();
        $array=array('mac', 'linux', 'palm', 'pocketpc', 'movil');
        if(in_array($_GET['platform'], $array)){
            $data = $this->apiCall( 'http://www.softonic.com/s/'.$_GET['program'].':'.$_GET['platform'].'/php/'.$_GET['pag']);
        }
        else{
            $data = $this->apiCall( 'http://www.softonic.com/s/'.$_GET['program'].'/php/'.$_GET['pag']);
        }
        //if(!is_string($data)){
            $this->formated_data = unserialize($data);
            $this->next = (($this->formated_data['total_search_results']/10 -($_GET['pag']-1)*10)>10);
        //}
    }
    
    public function getData(){
        return $this->formated_data['programs'];
    }
    
    public function getPlataforms(){
        return $this->platforms;
    }
    
    public function getCategory(){
        return $this->categoty;
    }
    
    public function hiHaNext(){
        return $this->next;
    }
}

?>
