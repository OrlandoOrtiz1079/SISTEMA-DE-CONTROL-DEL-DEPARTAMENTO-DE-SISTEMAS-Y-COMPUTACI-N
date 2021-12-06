<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=u297166837_cat","u297166837_dsc","DSCiti2021");
		// $link = new PDO("mysql:host=localhost;dbname=cat","root","patas");
		$link->exec("set names utf8");
		return $link;
	}

}
