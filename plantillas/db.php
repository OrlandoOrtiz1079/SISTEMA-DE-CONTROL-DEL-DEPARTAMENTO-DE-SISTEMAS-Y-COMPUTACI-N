<?PHP
//FUNCION QUE PERMITE CONECTARNOS A LA BASE DE DATOS
function conectarse()
   {
	if(!($link=mysqli_connect("localhost","root","")))
	    {
			echo "Error: No se pudo conectar a la base de datos";
			exit();
		}
				    			
		if(!mysqli_select_db($link,"cat"))
		    {
			  echo "Error: Seleccione la base de datos";
			  exit();
			}
			return $link;
   }
   conectarse();
?>