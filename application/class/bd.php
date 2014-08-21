<?php

class OperacionsBDException extends Exception {}

class operacionsBD {

	//Crea la connexió a la bd, retorna la conexió a $bd
	public function __construct($host, $usuario, $pass, $bd){
		if(mysql_connect($host, $usuario, $pass)){
			if(mysql_select_db($bd));
			else throw new OperacionsBDException ("ERROR TAULA");
		}
		else throw new OperacionsBDException ("ERROR CONEXIÓ");
	}
	
	//Ofereix la funció select
	public function select($query){
		$id = mysql_query($query);
		$res=false;
		if(!$id){
			echo mysql_error();
			echo '<br>';
		}
		else{
			while($fila=mysql_fetch_assoc($id)) $res[] = $fila;
		}
		return $res;
	}
	
	//Permet la possibilitat de: Update, Insert, Delete
	public function upindel($query){
		$id = mysql_query($query);
		if (!$id){
			echo mysql_error();
			echo '<br>';
		}
	}

}

?>
