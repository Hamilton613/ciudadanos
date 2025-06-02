<?php
   require_once("../basededatos/conexion.php");

   //agregar nuevo departamento
   if(isset($_POST['btn_insertar']));
   $codigo = $_POST['txt_codigo'];
   $depa = $_POST['txt_depto'];
   $cod_regi = $_POST['txt_cod_region'];

   echo "Datos del Departamento:";
   echo "<br>Codigo:";
   echo "<br>Departamento:";
   echo "<br>Codigo de Region:";
   $sql =" INSERT INTO departamentos (cod_depto, nombre_depto, cod_region)
           VALUES (" . intval($codigo) . ",'" . mysqli_real_escape_string($conexion, $depa). "', '" . mysqli_real_escape_string($conexion, $cod_regi) . "');"; 
    
    // Ejecutar consulta
    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header('Location: departamentos.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }

    //eliminar
    if(isset($_POST['btn_eli'])){
        $codigo = $_POST['hidden_eli'];
        $sql = "delete from departamentos where cod_depto=" . $codigo;
        try {
            $ejecutar = mysqli_query($conexion,$sql);
            echo "<br>Datos eliminados";
            header ('location: departamentos.php');
            exit;
        } catch ( Exception $th) {
            echo "<br>Datos no eliminados guardados<br>" . $th;
        }
    }

    //modificar
    if(isset($_POST['btn_acta'])){
        $codigo = $_POST['txt_codigo'];
        $depa = $_POST['txt_depto'];
        $cod_regi = $_POST['txt_cod_region'];
        echo "<br>Codigo: " . $codigo;
        echo "<br>Departamento: " . $depa;
        echo "<br>Codigo de Region: " . $cod_regi;

    $sql = 'UPDATE departamentos 
            SET nombre_depto = "' . $depa . '",
                cod_region = "' . $cod_regi . '"
            WHERE cod_depto = ' . $codigo . ';';

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Datos modificados";
        header('Location: departamentos.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no actualizados<br>" . $th;
    }

    }
?>