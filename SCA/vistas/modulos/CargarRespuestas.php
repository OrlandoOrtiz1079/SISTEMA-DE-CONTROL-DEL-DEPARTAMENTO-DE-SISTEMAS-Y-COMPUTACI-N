
<?php
// Preguntas
$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$carrera = $_POST['carrera'];

// Seccion1
$pri1 = $_POST['pri1'];
$pri2 = $_POST['pri2'];
$pri3 = $_POST['pri3'];
$pri4 = $_POST['pri4'];
$pri5 = $_POST['pri5'];
$pri6 = $_POST['pri6'];
$pri7 = $_POST['pri7'];

// Seccion 2
$pa1 = $_POST['pa1'];
$pa2 = $_POST['pa2'];
$pa3 = $_POST['pa3'];
$pa4 = $_POST['pa4'];

// Seccion 3
$pfi1 = $_POST['pfi1'];
$pfi2 = $_POST['pfi2'];
$pfi3 = $_POST['pfi3'];

// Seccion 4
$psa1 = $_POST['psa1'];
$psa2 = $_POST['psa2'];
$psa3 = $_POST['psa3'];
$psa4 = $_POST['psa4'];
$psa5 = $_POST['psa5'];
$realizada = "Si";

$Object = new DateTime();
$Object->setTimezone(new DateTimeZone('America/Mexico_City'));
$fecha = $Object->format("d-m-Y");

$stmt = Conexion::conectar()->prepare("INSERT INTO encuesta 
(correo, nombre, carrera, pri1, pri2, pri3, pri4, pri5, pri6, pri7, pa1, pa2, pa3, pa4, pfi1, pfi2, pfi3, psa1, psa2, psa3, psa4, psa5, realizada, fecha) 
VALUES 
(:correo, :nombre, :carrera, :pri1, :pri2, :pri3, :pri4, :pri5, :pri6, :pri7, :pa1, :pa2, :pa3, :pa4, :pfi1, :pfi2, :pfi3, :psa1, :psa2, :psa3, :psa4, :psa5, :realizada, :fecha)");

$stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
$stmt->bindParam(":carrera", $carrera, PDO::PARAM_STR);
$stmt->bindParam(":pri1", $pri1, PDO::PARAM_STR);
$stmt->bindParam(":pri2", $pri2, PDO::PARAM_STR);
$stmt->bindParam(":pri3", $pri3, PDO::PARAM_STR);
$stmt->bindParam(":pri4", $pri4, PDO::PARAM_STR);
$stmt->bindParam(":pri5", $pri5, PDO::PARAM_STR);
$stmt->bindParam(":pri6", $pri6, PDO::PARAM_STR);
$stmt->bindParam(":pri7", $pri7, PDO::PARAM_STR);
$stmt->bindParam(":pa1", $pa1, PDO::PARAM_STR);
$stmt->bindParam(":pa2", $pa2, PDO::PARAM_STR);
$stmt->bindParam(":pa3", $pa3, PDO::PARAM_STR);
$stmt->bindParam(":pa4", $pa4, PDO::PARAM_STR);
$stmt->bindParam(":pfi1", $pfi1, PDO::PARAM_STR);
$stmt->bindParam(":pfi2", $pfi2, PDO::PARAM_STR);
$stmt->bindParam(":pfi3", $pfi3, PDO::PARAM_STR);
$stmt->bindParam(":psa1", $psa1, PDO::PARAM_STR);
$stmt->bindParam(":psa2", $psa2, PDO::PARAM_STR);
$stmt->bindParam(":psa3", $psa3, PDO::PARAM_STR);
$stmt->bindParam(":psa4", $psa4, PDO::PARAM_STR);
$stmt->bindParam(":psa5", $psa5, PDO::PARAM_STR);
$stmt->bindParam(":realizada", $realizada, PDO::PARAM_STR);
$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);

if ($stmt->execute()) {

    echo "<script>
Swal.fire({
type: 'success',
title: '¡Muchas gracias por participar en la encuesta!<br>{$nombre}',
showConfirmButton: true,
timer: 100000,
confirmButtonText: 'Aceptar',
closeOnConfirm: false
}).then((result)=>{
if(result.value){
   window.location = 'Encuestainicio';
}
});
</script>";

    // echo '<script>
    // Swal.fire({
    // type: "success",
    // title: "¡Muchas gracias por participar en la encuesta!",
    // showConfirmButton: true,
    // timer: 100000,
    // confirmButtonText: "Aceptar",
    // closeOnConfirm: false
    // }).then((result)=>{
    // if(result.value){
    //    window.location = "Encuestainicio";
    // }
    // });
    // </script>';
} else {

    echo "kdhvdfgfhgjhjgfdgrdthfyjguhijfbd";
}
