<?php

class Conexion
{

	static public function conectar()
	{

		$link = new PDO("mysql:host=localhost;dbname=cat", "u297166837.dsc", "DscIti2021.");
		// $link = new PDO("mysql:host=localhost;dbname=sdr","root","patas");
		$link->exec("set names utf8");
		return $link;
	}
}
