<?php
require_once("../basededatos/conexion.php");

// agregar nuevo municipio
if (isset($_POST['btn_insertar'])) {
    $codigo = $_POST['txt_codigo'];
    $muni = $_POST['txt_muni'];
    $cod_depa = $_POST['text_cod_depa'];

    echo "Datos de la región:";
    echo "<br>Código: " . $codigo;
    echo "<br>Municipio: " . $muni;
    echo "<br>Código de Departamento: " . $cod_depa;
    $sql = "INSERT INTO municipios (cod_muni, nombre_municipio, cod_depto) 
            VALUES (" . intval($codigo) . ", '" . mysqli_real_escape_string($conexion, $muni) . "', '" . mysqli_real_escape_string($conexion, $cod_depa) . "');";

    // Ejecutar consulta
    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header('Location: municipios.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}

//eliminar
if (isset($_POST['btn_eli'])){
    $codigo = $_POST['hidden_eli'];
    $sql = "delete from municipios where cod_muni=". $codigo;
    try {
        $ejecutar = mysqli_query($conexion,$sql);
        echo "<br>Datos eliminados:";
        header('location: municipios.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no eliminados guardados<br>". $th;
    }
}

//modificar
if (isset($_POST['btn_acta'])) {
    $codigo = $_POST['txt_codigo'];
    $muni = $_POST['txt_muni'];
    $cod_depa = $_POST['text_cod_depa']; 
    echo "<br>Codigo: " . $codigo;
    echo "<br>Municipio: " . $muni;
    echo "<br>Codigo de Departamento: " . $cod_depa;

    $sql = 'UPDATE municipios 
            SET nombre_municipio = "' . $muni . '",
                cod_depto = "' . $cod_depa . '"
            WHERE cod_muni = ' . $codigo . ';';

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Datos modificados";
        header('Location: municipios.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no actualizados<br>" . $th;
    }
}


?>
