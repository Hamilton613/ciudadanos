<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Municipios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      background: linear-gradient(135deg, #f0f4ff, #dbeafe);
      background-size: 200% 200%;
      animation: moveBg 15s ease infinite;
    }

    @keyframes moveBg {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .container {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    h2 {
      font-weight: bold;
      color: #333;
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

    .modal-content {
      border-radius: 15px;
    }
  </style>
</head>
<body>

  <?php
    require_once("../basededatos/conexion.php");
    $sql = "SELECT * FROM municipios";
    $ejecutar = mysqli_query($conexion, $sql);
  ?>

  <div class="container mt-5">
    <h2 class="text-center mb-4">Listado de Municipios</h2>

    <!-- Botón para regresar -->
    <div class="text-start mt-4">
      <a href="../index.php" class="btn btn-primary">
        <i class="bi bi-arrow-left-circle"></i> Regresar
      </a>
    </div>

    <!-- Botón que lanza el modal -->
    <div class="d-flex justify-content-center my-4">
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-plus-circle-fill"></i> Agregar Municipio
      </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Municipio</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <form action="crud_muni.php" method="post">
              <label for="txt_codigo" class="form-label">Código</label>
              <input type="number" name="txt_codigo" id="txt_codigo" class="form-control">
              <label for="txt_muni" class="form-label">Municipio</label>
              <input type="text" name="txt_muni" id="txt_muni" class="form-control">
              <label for="text_cod_depa" class="form-label">Código del Departamento</label>
              <input type="text" name="text_cod_depa" id="text_cod_depa" class="form-control">
              <br>
              <button type="submit" class="form-control btn btn-success" name="btn_insertar">
                <i class="bi bi-check-circle"></i> Agregar Municipio
              </button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabla -->
    <table class="table table-bordered table-light text-center w-75 mx-auto fs-5 shadow">
      <thead class="table-primary">
        <tr>
          <th>Código</th>
          <th>Municipio</th>
          <th>Código de Departamento</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($datos = mysqli_fetch_assoc($ejecutar)) { ?>
          <tr>
            <td><?php echo htmlspecialchars($datos['cod_muni']); ?></td>
            <td><?php echo htmlspecialchars($datos['nombre_municipio']); ?></td>
            <td><?php echo htmlspecialchars($datos['cod_depto']); ?></td>
            <td class="d-flex justify-content-center gap-2">
              <form action="crud_muni.php" method="post">
                <input type="hidden" name="hidden_eli" value="<?php echo htmlspecialchars($datos['cod_muni']); ?>">
                <button type="submit" name="btn_eli" class="btn btn-outline-danger">
                  <i class="bi bi-trash3-fill"></i>
                </button>
              </form>
              <form action="form_act_muni.php" method="post">
                <input type="hidden" name="hidden_acta" value="<?php echo htmlspecialchars($datos['cod_muni']); ?>">
                <button type="submit" name="btn_act" class="btn btn-outline-success">
                  <i class="bi bi-pencil-square"></i>
                </button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
