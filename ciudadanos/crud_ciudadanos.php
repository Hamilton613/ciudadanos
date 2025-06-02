<?php
   require_once("../basededatos/conexion.php");

   //agregar nuevo ciudadano
   if(isset($_POST['btn_insertar']));
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

   echo "Datos del Ciudadano:";
   echo "<br>dpi:";
   echo "<br>apellido:";
    echo "<br>nombre:";
    echo "<br>direccion:";
    echo "<br>telefono casa:";
    echo "<br>telefono celular:";
    echo "<br>email:";
    echo "<br>fecha de nacimiento:";
    echo "<br>nivel academico:";
    echo "<br>codigo de municipio:";
   $sql =" INSERT INTO departamentos (dpi, apellido, nombre, direccion, tel_casa, tel_movil, email, fechanac, cod_nivel_acad, cod_muni)
           VALUES (" . intval($codigo) . ",'" . mysqli_real_escape_string($conexion, $depa). "', '" . mysqli_real_escape_string($conexion, $cod_regi) . "');"; 
    
    // Ejecutar consulta
    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header('Location: ciudadanos.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }

    //eliminar
    if(isset($_POST['btn_eli'])){
        $codigo = $_POST['hidden_eli'];
        $sql = "delete from ciudadanos where dpi=" . $codigo;
        try {
            $ejecutar = mysqli_query($conexion,$sql);
            echo "<br>Datos eliminados";
            header ('location: ciudadanos.php');
            exit;
        } catch ( Exception $th) {
            echo "<br>Datos no eliminados guardados<br>" . $th;
        }
    }

    //modificar
    if(isset($_POST['btn_acta'])){
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
        echo "Datos del Ciudadano:";
        echo "<br>dpi:";
        echo "<br>apellido:";
        echo "<br>nombre:";
        echo "<br>direccion:";
        echo "<br>telefono casa:";
        echo "<br>telefono celular:";
        echo "<br>email:";
        echo "<br>fecha de nacimiento:";
        echo "<br>nivel academico:";
        echo "<br>codigo de municipio:";

    $sql = 'UPDATE departamentos 
            SET dpi = "' . $dpi . '",
                apellido = "' . $apell . '",
                nombre = "' . $nomb . '",
                direccion = "' . $direccion . '",
                tel_casa = "' . $tel_casa . '",
                tel_movil = "' . $tel_cel . '",
                email = "' . $email . '",
                fechanac = "' . $fechanac . '",
                cod_nivel_acad = "' . $nivelacad . '",
                cod_muni = "' . $cod_muni . '"
            WHERE dpi = ' . intval($dpi) . ';';

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Datos modificados";
        header('Location: ciudadanos.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no actualizados<br>" . $th;
    }

    }
?>