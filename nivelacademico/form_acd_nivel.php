<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Niveles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
</head>
<body>
     <?php 
        $codigo = $_POST['hidden_acta'];
        require_once("../basededatos/conexion.php");
        $sql="select * from nivelesacademicos where cod_nivel_acad=".$codigo;
        $ejecutar =mysqli_query($conexion, $sql);
        $datos = mysqli_fetch_assoc($ejecutar);
        ?>
    <div class="container">
        <br>
        <h1 class="text-center">Modificar Niveles</h1>
        <br>
        <form action="crud_nivel.php" method="post">
            <label for="txt_codigo" class="form-label">Codigo</label>
            <input type="number" name="txt_codigo" id="txt_codigo" value="<?php echo $codigo;?>" class="form-control" readonly>
            <label for="txt_nombre"  class="form-label">Nombre</label>
            <input type="text" name="txt_nombre" id="txt_nombre" value="<?php echo $datos['nombre'];?>" class="form-control">
            <label for="text_desc" class="form-label">Descripcion</label>
            <input type="text" name="txt_nivel" id="txt_nivel" value="<?php echo $datos['descripcion'];?>" class="form-control">
            <br>
            <button type="submit" class="form-control btn btn-primary" name="btn_acta" id="btn_acta">Modificar Municipio</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>