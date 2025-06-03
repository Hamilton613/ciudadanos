<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Regiones</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      background: linear-gradient(135deg, #fdfcfb, #e2d1c3);
      background-size: 200% 200%;
      animation: gradientMove 15s ease infinite;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .container {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .modal-content {
      border-radius: 15px;
    }

    .btn {
      transition: all 0.3s ease;
    }

    .btn:hover {
      transform: scale(1.05);
    }

    .table {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }

    h2 {
      font-weight: bold;
      color: #333;
    }

    .form-label {
      margin-top: 10px;
    }
  </style>
</head>
<body>

<?php
  require_once("../basededatos/conexion.php");
  $sql = "SELECT * FROM regiones";
  $ejecutar = mysqli_query($conexion, $sql);
?>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Listado de Regiones</h2>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <i class="bi bi-plus-circle-fill"></i> Agregar Región
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Región</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="crud_region.php" method="post">
              <label for="txt_codigo" class="form-label">Código</label>
              <input type="number" name="txt_codigo" id="txt_codigo" class="form-control">
              <label for="txt_nombre" class="form-label">Nombre</label>
              <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">
              <label for="text_desc" class="form-label">Descripción</label>
              <input type="text" name="text_desc" id="text_desc" class="form-control">
              <br>
              <button type="submit" class="form-control btn btn-success" name="btn_insertar" id="btn_insertar">
                <i class="bi bi-check-circle"></i> Agregar Región
              </button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabla actualizada -->
    <table class="table table-bordered table-light text-center w-75 mx-auto fs-5 shadow rounded">
      <thead class="table-primary">
        <tr>
          <th>Código</th>
          <th>Región</th>
          <th>Descripción</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while($datos = mysqli_fetch_assoc($ejecutar)) { ?>
          <tr>
            <td><?php echo htmlspecialchars($datos['cod_region']); ?></td>
            <td><?php echo htmlspecialchars($datos['nombre']); ?></td>
            <td><?php echo htmlspecialchars($datos['descripcion']); ?></td>
            <td class="d-flex justify-content-center gap-2">
              <form action="crud_region.php" method="post">
                <input type="hidden" name="hidden_codigo" value="<?php echo htmlspecialchars($datos['cod_region']); ?>">
                <button type="submit" name="btn_eliminar" class="btn btn-outline-danger">
                  <i class="bi bi-trash3-fill"></i>
                </button>
              </form>
              <form action="form_actualizar_region.php" method="post">
                <input type="hidden" name="hidden_codigoa" value="<?php echo htmlspecialchars($datos['cod_region']); ?>">
                <button type="submit" name="btn_editar" class="btn btn-outline-success">
                  <i class="bi bi-pencil-square"></i>
                </button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <div class="text-center mt-4">
      <a href="../index.php" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i> Regresar</a>
    </div>
  </div>
  <br>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
