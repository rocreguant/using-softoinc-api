<?php

// he de concatenar!
class ProgramModel {
    //private $params;
    private $formated_data;
    private $id_programa;
    
    public function __construct() {}
    
    public function setId( $id ){
        $this->id_programa = $id;
    }
    
    public function run(){
        /*
         * $params[0]=search
         * $_GET['program']=coses a buscar, separat per +
         * $_GET['pag']=pagina on estic
         */
        //filtrar l'imput!!
        $ch = curl_init( 'http://api2.softonic.com/es/program_getInfo/'.$this->id_programa.'.php?key=8f33a48c96dea8afafe5d48e3fdd1aa9');
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
        curl_setopt( $ch, CURLOPT_HEADER, 0 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        $received_data = curl_exec( $ch );
        $this->formated_data = unserialize($received_data);
    }
    
    public function getData(){
        return $this->formated_data;
    }
    
}

?>
