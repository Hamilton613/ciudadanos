<?php 
     //vamos a utilizar la conexión existente
        require_once("../basededatos/conexion.php");
        //proceso de eliminar
    if(isset($_POST['btn_modificar'])){
      $codigo = $_POST['txt_codigo'] ; 
      $nombre = $_POST['txt_nombre']; 
      $desc = $_POST['text_desc'];
      echo "<br>Codigo:" . $codigo;
      echo "<br>Nombre:" . $nombre;
      echo "<br>Descripcio n:" . $desc;
      $sql= 'UPDATE regiones 
             SET nombre="'.$nombre.'",
                descripcion="'.$desc.'" 
              WHERE 
                 cod_region='.$codigo.';';
      echo $sql;
      try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Datos modificados";
        header('location: vistaregiones.php');
        exit;
      } catch (Exception $th) {
        echo "<br>Datos no actualizados<br>" . $th;
      }
    }



    if(isset($_POST['btn_eliminar'])){
        $codigo = $_POST['hidden_codigo'];
        $sql = "delete from regiones where cod_region=".$codigo;
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br>Datos eliminados";
            header('Location: vistaregiones.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no eliminados guardados<br>". $th;        
        } 
    }

    //proceso de insertar
    if(isset($_POST['btn_insertar'])){
        //variable para cada dato que viene del formulario 
        $codigo = $_POST['txt_codigo'];
        $nombre = $_POST['txt_nombre'];
        $desc = $_POST['txt_desc'];
        echo "Datos de la región:";
        echo "<br>Codigo: ". $codigo;
        echo "<br>Nombre: ". $nombre;
        echo "<br>Descripción: ". $desc;
       
        $sql="insert into regiones(cod_region,nombre,descripcion) 
            values(".$codigo.",'".$nombre."','".$desc."');";
        //ejecutar el sql en la conexión existente
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            //echo "valor de Ejecutar: ". $ejecutar;
            echo "<br>Datos almacenados";
            header('Location: vistaregiones.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no fueron guardados<br>". $th;        
        } 

    }
?>