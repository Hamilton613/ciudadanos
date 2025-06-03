<?php
require_once("../basededatos/conexion.php");

// AGREGAR NUEVO CIUDADANO
if (isset($_POST['btn_insertar'])) {
    $dpi = $_POST['dpi'];
    $apell = $_POST['txt_apellido'];
    $nomb = $_POST['txt_nombre'];
    $direccion = $_POST['txt_direccion'];
    $tel_casa = $_POST['txt_telefono_casa'];
    $tel_cel = $_POST['txt_telefono_celular'];
    $email = $_POST['txt_email'];
    $fechanac = $_POST['txt_fechanacimiento'];
    $nivelacad = $_POST['txt_nivel_academico'];
    $cod_muni = $_POST['txt_cod_municipio'];

    $sql = "INSERT INTO ciudadanos (dpi, apellido, nombre, direccion, tel_casa, tel_movil, email, fechanac, cod_nivel_acad, cod_muni)
            VALUES ('$dpi', '$apell', '$nomb', '$direccion', '$tel_casa', '$tel_cel', '$email', '$fechanac', '$nivelacad', '$cod_muni')";

    try {
        mysqli_query($conexion, $sql);
        header('Location: ciudadanos.php?msg=insertado');
        exit;
    } catch (Exception $e) {
        echo "<div style='color: red; font-weight: bold;'>Error al guardar los datos: {$e->getMessage()}</div>";
    }
}

// ELIMINAR CIUDADANO
if (isset($_POST['btn_eli'])) {
    $codigo = $_POST['hidden_eli'];
    $sql = "DELETE FROM ciudadanos WHERE dpi = $codigo";
    try {
        mysqli_query($conexion, $sql);
        header('Location: ciudadanos.php?msg=eliminado');
        exit;
    } catch (Exception $e) {
        echo "<div style='color: red; font-weight: bold;'>Error al eliminar: {$e->getMessage()}</div>";
    }
}

// MODIFICAR CIUDADANO
if (isset($_POST['btn_acta'])) {
    $dpi = $_POST['dpi'];
    $apell = $_POST['txt_apellido'];
    $nomb = $_POST['txt_nombre'];
    $direccion = $_POST['txt_direccion'];
    $tel_casa = $_POST['txt_telefono_casa'];
    $tel_cel = $_POST['txt_telefono_celular'];
    $email = $_POST['txt_email'];
    $fechanac = $_POST['txt_fechanacimiento'];
    $nivelacad = $_POST['txt_nivel_academico'];
    $cod_muni = $_POST['txt_cod_municipio'];

    $sql = "UPDATE ciudadanos SET
                apellido = '$apell',
                nombre = '$nomb',
                direccion = '$direccion',
                tel_casa = '$tel_casa',
                tel_movil = '$tel_cel',
                email = '$email',
                fechanac = '$fechanac',
                cod_nivel_acad = '$nivelacad',
                cod_muni = '$cod_muni'
            WHERE dpi = '$dpi'";

    try {
        mysqli_query($conexion, $sql);
        header('Location: ciudadanos.php?msg=modificado');
        exit;
    } catch (Exception $e) {
        echo "<div style='color: red; font-weight: bold;'>Error al modificar: {$e->getMessage()}</div>";
    }
}
?>
