<?php

class ControladorMostrarAlunmosG
{
    /*=============================================
    MOSTRAR TODOS LOS ALUMNOS GENERAL
    =============================================*/
    public static function ctrMostrarAlumnos()
    {

        $Object = new DateTime();
        $Object->setTimezone(new DateTimeZone('America/Mexico_City'));
        $DateEntrada = $Object->format("d-m-Y");
        $tabla = "alumnos";
        $item = null;
        $valor = "";

        $respuesta = ModeloMostrarAlumnosG::MdlMostrarAlumnos($tabla, $item, $valor, $DateEntrada);

        foreach ($respuesta as $key => $value) {
            echo ' <tr class="table-success">
                            <td>' . $value["id"] . '</td>
                            <td>' . $value["nocontrol"] . '</td>
                            <td>' . $value["nombre"] . '</td>
                            <td>' . $value["carrera"] . '</td>
                            <td>' . $value["entrada"] . '</td>
                            <td>' . $value["enhora"] . '</td>
                            <td>' ?>
                                 <?php
                                    if (empty($value["sahora"])) {
                                        echo '<label style="color: white; background-color: red;"><strong> Dentro del la Institución </strong></label>';
                                    } else {
                                        echo  '<label style="color: white; background-color: green;"> <strong>' . $value["sahora"] . ' </strong></label>';
                                    }
                                    ?>
                                <?php
                                '</td>
                    </tr>';
                            }
                        }
                    }
