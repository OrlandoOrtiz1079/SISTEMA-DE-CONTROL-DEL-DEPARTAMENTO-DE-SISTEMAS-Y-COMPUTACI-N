<?php
$txtNC = $_POST['txtNC'];


?>

<div class="col-12 mt-3">
    <div class="card">
        <h2 style="padding-top: 2%;" align="center" class="ml-4">CONSTANCIAS DE <?php echo $txtNC;  ?> </h2>
        <div class="card-body">
            <div class="data-tables datatable-primary">
                <table class="text-center tablaES">
                    <thead class="text-capitalize">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Numero de control</th>
                            <th>Carrera</th>
                            <th>Numero de Creditos</th>
                            <th>Nombre del evento</th>
                            <th>Periodo</th>
                            <th>Generada Por</th>
                            <th>Fecha</th>
                            <th>Valor Numerico</th>
                            <th>Imprimir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = $txtNC;
                        $valor = null;
                        $stmt = Conexion::conectar()->prepare("SELECT * FROM datos_alumnos WHERE Numero_C = :Numero_C ORDER BY  Fecha DESC");
                        $stmt->bindParam(":Numero_C", $item, PDO::PARAM_STR);
                        $stmt->execute();
                        $c = 0;
                        foreach ($stmt as $key => $value) {
                            if ($value["Nombre"] != "NA") {
                                $c++;
                                echo '<tr>
                                        <td>' . $c . '</td>';
                                echo '<td>' . $value["Nombre"] . '</td>';
                                echo '<td>' . $value["Apellido_P"] . '</td>';
                                echo '<td>' . $value["Apellido_M"] . '</td>';
                                echo '<td>' . $value['Numero_C'] . '</td>';
                                echo '<td>' . $value['Carrera'] . '</td>';
                                echo '<td>' . $value['Numero_Creditos'] . '</td>';
                                echo '<td>' . $value['Nombre_Evento'] . '</td>';
                                echo '<td>' . $value['Periodo'] . '</td>';
                                echo '<td>' . $value['Generada_Por'] . '</td>';
                                echo '<td>' . $value['Fecha'] . '</td>';
                                echo '<td>' . $value['Valor_Numerico'] . '</td>';
                        ?><td>
                                    <form method="post" target="_blank" action="pdf/tesis/Genera.php">
                                        <input name="txtNombre" type="hidden" value=<?php echo "'$value[Nombre]'"; ?>>
                                        <input name="txtAP" type="hidden" value=<?php echo "'$value[Apellido_P]'"; ?>>
                                        <input name="txtAM" type="hidden" value=<?php echo "'$value[Apellido_M]'"; ?>>
                                        <input name="txtNC" type="hidden" value=<?php echo "'$value[Numero_C]'"; ?>>
                                        <input name="txtCarrera" type="hidden" value=<?php echo "'$value[Carrera]'"; ?>>
                                        <input name="txtNumCred" type="hidden" value=<?php echo "'$value[Numero_Creditos]'"; ?>>
                                        <input name="txtVal" type="hidden" value=<?php echo "'$value[Valor_Numerico]'"; ?>>
                                        <input name="txtEven" type="hidden" value=<?php echo "'$value[Nombre_Evento]'"; ?>>
                                        <input name="txtPer" type="hidden" value=<?php echo "'$value[Periodo]'"; ?>>
                                        <input name="fecha" type="hidden" value=<?php echo "' $value[Fecha]'"; ?> />
                                        <input name="nombre" type="hidden" value=<?php echo "'$value[Generada_Por]'"; ?> />
                                        <input name="tabla_constancia" type="hidden" value="1" />
                                        <button type="submit" class="btn btn-success btnImprimirDoc"><i class="fa fa-print"></i></button>

                                    </form>
                                    </tr>
                            <?php
                            }
                        }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>