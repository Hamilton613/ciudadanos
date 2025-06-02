<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Departamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
</head>
<body>
    <?php
       $codigo = $_POST['hidden_acta'];
       require_once("../basededatos/conexion.php");
       $sql ="select * from departamentos where cod_depto=" . $codigo;
       $ejecutar = mysqli_query($conexion, $sql);
       $datos = mysqli_fetch_assoc($ejecutar);
    ?>
    <div class="container">
        <br>
        <h1 class="text-center">Modificar Municipios</h1>
        <br>
        <form action="crud_depa.php" method="post">
            <label for="txt_codigo" class="form-label">Codigo</label>
            <input type="number" name="txt_codigo" id="txt_codigo" value="<?php echo $codigo;?>" class="form-control" readonly>
            <label for="txt_nombre"  class="form-label">Departamento</label>
            <input type="text" name="txt_depto" id="txt_depto" value="<?php echo $datos['nombre_depto'];?>" class="form-control">
            <label for="text_desc" class="form-label">Codigo De Region</label>
            <input type="text" name="txt_cod_region" id="txt_cod_region" value="<?php echo $datos['cod_region'];?>" class="form-control">
            <br>
            <button type="submit" class="form-control btn btn-primary" name="btn_acta" id="btn_acta">Modificar Departamento</button>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>