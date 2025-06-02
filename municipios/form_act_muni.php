<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Municipios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
</head>
<body>
     <?php 
        $codigo = $_POST['hidden_acta'];
        require_once("../basededatos/conexion.php");
        $sql="select * from municipios where cod_muni=".$codigo;
        $ejecutar =mysqli_query($conexion, $sql);
        $datos = mysqli_fetch_assoc($ejecutar);
        ?>
    <div class="container">
        <br>
        <h1 class="text-center">Modificar Municipios</h1>
        <br>
        <form action="crud_muni.php" method="post">
            <label for="txt_codigo" class="form-label">Codigo</label>
            <input type="number" name="txt_codigo" id="txt_codigo" value="<?php echo $codigo;?>" class="form-control" readonly>
            <label for="txt_nombre"  class="form-label">Municipio</label>
            <input type="text" name="txt_muni" id="txt_muni" value="<?php echo $datos['nombre_municipio'];?>" class="form-control">
            <label for="text_desc" class="form-label">Codigo Del Departamento</label>
            <input type="text" name="text_cod_depa" id="text_cod_depa" value="<?php echo $datos['cod_depto'];?>" class="form-control">
            <br>
            <button type="submit" class="form-control btn btn-primary" name="btn_acta" id="btn_acta">Modificar Municipio</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>