<?php
require_once("../basededatos/conexion.php");

// agregar nuevo nivel
if (isset($_POST['btn_insertar'])) {
    $codigo = $_POST['txt_codigo'];
    $nivel = $_POST['txt_nombre'];
    $cod_acad = $_POST['txt_nivel'];

    echo "Datos del nivel:";
    echo "<br>Código: " . $codigo;
    echo "<br>nivel: " . $nivel;
    echo "<br>Descripcion: " . $cod_acad;

    $sql = "INSERT INTO nivelesacademicos (cod_nivel_acad, nombre, descripcion) 
            VALUES (" . intval($codigo) . ", '" . mysqli_real_escape_string($conexion, $nivel) . "', '" . mysqli_real_escape_string($conexion, $cod_acad) . "');";

    // Ejecutar consulta
    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header('Location: academico.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}

//eliminar
if (isset($_POST['btn_eli'])){
    $codigo = $_POST['hidden_eli'];
    $sql = "delete from nivelesacademicos where cod_nivel_acad=". $codigo;
    try {
        $ejecutar = mysqli_query($conexion,$sql);
        echo "<br>Datos eliminados:";
        header('location: academico.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no eliminados guardados<br>". $th;
    }
}

//modificar
if (isset($_POST['btn_acta'])) {
    $codigo = $_POST['txt_codigo'];
    $nivel = $_POST['txt_nombre'];
    $cod_acad = $_POST['txt_nivel'];

    echo "<br>Código: " . $codigo;
    echo "<br>nivel: " . $nivel;
    echo "<br>Descripcion: " . $cod_acad;

    $sql = 'UPDATE nivelesacademicos 
            SET nombre = "' . $nivel . '",
                descripcion = "' . $cod_acad . '"
            WHERE cod_nivel_acad = ' . $codigo . ';';

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Datos modificados";
        header('Location: academico.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no actualizados<br>" . $th;
    }
}


?>
