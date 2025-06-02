<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Regiones</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<?php
  require_once("../basededatos/conexion.php");

  $sql = "SELECT * FROM regiones";
  $ejecutar = mysqli_query($conexion, $sql);
?>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Listado de Regiones</h2>
       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Region</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Region</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="crud_region.php" method="post">
            <label for="txt_codigo" class="form-label">Codigo</label>
            <input type="number" name="txt_codigo" id="txt_codigo" class="form-control">
            <label for="txt_nombre" class="form-label">Nombre</label>
            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">
            <label for="text_desc" class="form-label">Descripcion</label>
            <input type="text" name="text_desc" id="text_desc" class="form-control">
            <br>
            <button type="submit" class="form-control btn btn-primary" name="btn_insertar" id="btn_insertar">Agregar Region</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<br>
<br>
    <table class="table table-bordered table-danger text-center w-75 mx-auto fs-5">
      <thead class="table-dark">
        <tr>
          <th>Código</th>
          <th>Región</th>
          <th>Descripción</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while($datos = mysqli_fetch_assoc($ejecutar)) {
            ?>
            <tr>
              <td><?php echo htmlspecialchars($datos['cod_region']); ?></td>
              <td><?php echo htmlspecialchars($datos['nombre']); ?></td>
              <td><?php echo htmlspecialchars($datos['descripcion']); ?></td>
              <td  class="d-flex justify-content-center gap-2">
                <form action="crud_region.php" method="post">
                  <input type="hidden" name="hidden_codigo" id="hidden_codigo" value="<?php echo htmlspecialchars($datos['cod_region']); ?>">
                  <button type="submit" name="btn_eliminar" id="btn_eliminar" class=" btn btn-outline-danger">
                    <i class="bi bi-trash3-fill"></i>
                  </button>
                </form>
                <form action="form_actualizar_region.php" method="post">
                  <input type="hidden" name="hidden_codigoa" id="hidden_codigoa" value="<?php echo htmlspecialchars($datos['cod_region']); ?>">
                  <button type="submit" name="btn_editar" id="btn_editar" class=" btn btn-outline-success" >
                    <i class="bi bi-pencil-square"></i>
                  </button>
                </form>
              </td>
            </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
    <div class="text-center mt-4">
      <a href="../index.php" class="btn btn-primary">Regresar</a>
    </div>

  </div>
  <br>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
