<?php

class conexao{

	function connect(){

		try{
			$this->$conn = new PDO ("mysql:host=localhost;dbname=sistema","root","vagrant");

			return $this->$conn;

		}catch(PDOException $exc){

			echo "error".$exc->getMessage();

		}
	}
}
?>