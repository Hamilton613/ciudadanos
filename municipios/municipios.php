<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Municipios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

  <?php
    require_once("../basededatos/conexion.php");
    $sql = "SELECT * FROM municipios";
    $ejecutar = mysqli_query($conexion, $sql);
  ?>

  <div class="container mt-5">
    <h2 class="text-center mb-4">Listado de Municipios</h2>

    <!-- Botón para regresar -->
    <div class="text-start mt-4">
      <a href="../index.php" class="btn btn-primary">Regresar</a>
    </div>

    <!-- Botón que lanza el modal -->
    <div class="d-flex justify-content-center my-4">
      <button type="button" class="btn btn-success gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar Municipios
      </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Municipio</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="crud_muni.php" method="post">
            <label for="txt_codigo" class="form-label">Codigo</label>
            <input type="number" name="txt_codigo" id="txt_codigo" class="form-control">
            <label for="txt_muni" class="form-label">Municipios</label>
            <input type="text" name="txt_muni" id="txt_muni" class="form-control">
            <label for="text_cod_depa" class="form-label">Codigo De Dapartemanto</label>
            <input type="text" name="text_cod_depa" id="text_cod_depa" class="form-control">
            <br>
            <button type="submit" class="form-control btn btn-success" name="btn_insertar" id="btn_insertar">Agregar Municipio</button>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <table class="table table-bordered table-danger text-center w-75 mx-auto fs-5">
      <thead class="table-dark">
        <tr>
          <th>Código</th>
          <th>Municipios</th>
          <th>Código De Departamento</th>
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
                <input type="hidden" name="hidden_eli" id="hidden_eli" value="<?php echo htmlspecialchars($datos['cod_muni']); ?>">
                <button type="submit" name="btn_eli" id="btn_eli" class=" btn btn-outline-danger">
                  <i class="bi bi-trash3-fill"></i>
                </button>
              </form>
              <form action="form_act_muni.php" method="post">
                <input type="hidden" name="hidden_acta" id="hidden_acta" value="<?php echo htmlspecialchars($datos['cod_muni']); ?>">
                <button type="submit" name="btn_act" id="btn_act" class=" btn btn-outline-success">
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
