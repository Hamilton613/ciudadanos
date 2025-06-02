<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Ciudadanos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <?php
      require_once("../basededatos/conexion.php");
      $sql = "SELECT * FROM ciudadanos";
      $ejecutar = mysqli_query($conexion,$sql);
    ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Listado De Ciudadanos</h2>

        <!--boton para regresar-->
        <div class="text-start mt-4">
            <a href="../index.php" class="btn btn-primary">Regresar</a>
        </div>

        <!--boton que lanza el modal-->
         <!-- Botón que lanza el modal -->
        <div class="d-flex justify-content-center my-4">
          <button type="button" class="btn btn-success gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
           Agregar Niveles
          </button>
        </div>
        
         <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Nivel</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="crud_nivel.php" method="post">
            <label for="txt_codigo" class="form-label">Codigo</label>
            <input type="number" name="txt_codigo" id="txt_codigo" class="form-control">
            <label for="txt_nombre" class="form-label">Nombre</label>
            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">
            <label for="txt_nivel" class="form-label">Descripcion</label>
            <input type="text" name="txt_nivel" id="txt_nivel" class="form-control">
            <br>
            <button type="submit" class="form-control btn btn-success" name="btn_insertar" id="btn_insertar">Agregar Nivel</button>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    

    </div>
    
</body>
</html>