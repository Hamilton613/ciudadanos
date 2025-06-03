<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Listado de Departamentos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
  <style>
    body {
      background: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card {
      box-shadow: 0 4px 10px rgb(0 0 0 / 0.1);
      border-radius: 1rem;
    }
    .table thead {
      background-color: #343a40;
      color: #fff;
    }
    .table tbody tr:nth-child(odd) {
      background-color: #f1f3f5;
    }
    .btn-icon {
      font-size: 1.2rem;
      line-height: 1;
    }
    .modal-content {
      border-radius: 1rem;
      overflow: hidden;
    }
    .modal-header {
      background-color: #198754;
      color: white;
      border-bottom: none;
    }
    .modal-footer {
      border-top: none;
    }
    .btn-primary, .btn-success {
      font-weight: 600;
    }
  </style>
</head>
<body>

  <?php
    require_once("../basededatos/conexion.php");
    $sql = "SELECT * FROM departamentos";
    $ejecutar = mysqli_query($conexion, $sql);
  ?>

  <div class="container py-5">
    <div class="mb-4 d-flex justify-content-between align-items-center">
      <h2 class="mb-0 text-secondary fw-bold">Listado de Departamentos</h2>
      <a href="../index.php" class="btn btn-primary shadow-sm">
        <i class="bi bi-arrow-left-circle me-2"></i> Regresar
      </a>
    </div>

    <div class="card p-4 mb-5 bg-white">
      <div class="d-flex justify-content-center mb-4">
        <button type="button" class="btn btn-success btn-lg shadow-sm" data-bs-toggle="modal" data-bs-target="#nuevoDepartamentoModal">
          <i class="bi bi-plus-lg me-2"></i> Agregar Departamento
        </button>
      </div>

      <!-- Modal Agregar Departamento -->
      <div class="modal fade" id="nuevoDepartamentoModal" tabindex="-1" aria-labelledby="nuevoDepartamentoLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="nuevoDepartamentoLabel">Nuevo Departamento</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
              <form action="crud_depa.php" method="post" novalidate>
                <div class="mb-3">
                  <label for="txt_codigo" class="form-label fw-semibold">Código</label>
                  <input type="number" name="txt_codigo" id="txt_codigo" class="form-control" min="1" required />
                </div>

                <div class="mb-3">
                  <label for="txt_depto" class="form-label fw-semibold">Nombre del Departamento</label>
                  <input type="text" name="txt_depto" id="txt_depto" class="form-control" required />
                </div>

                <div class="mb-3">
                  <label for="txt_cod_region" class="form-label fw-semibold">Código de Región</label>
                  <input type="text" name="txt_cod_region" id="txt_cod_region" class="form-control" required />
                </div>

                <button type="submit" class="btn btn-success w-100 fw-bold" name="btn_insertar" id="btn_insertar">
                  <i class="bi bi-check2-circle me-2"></i> Agregar Departamento
                </button>
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger fw-semibold" data-bs-dismiss="modal">
                <i class="bi bi-x-circle me-1"></i> Cerrar
              </button>
            </div>

          </div>
        </div>
      </div>

      <!-- Tabla de departamentos -->
      <table class="table table-bordered table-hover text-center align-middle fs-5 mb-0">
        <thead>
          <tr>
            <th>Código</th>
            <th>Departamento</th>
            <th>Código De Región</th>
            <th style="width: 140px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($datos = mysqli_fetch_assoc($ejecutar)) : ?>
            <tr>
              <td><?php echo htmlspecialchars($datos['cod_depto']); ?></td>
              <td><?php echo htmlspecialchars($datos['nombre_depto']); ?></td>
              <td><?php echo htmlspecialchars($datos['cod_region']); ?></td>
              <td class="d-flex justify-content-center gap-3">
                <form action="crud_depa.php" method="post" onsubmit="return confirm('¿Estás seguro de eliminar este departamento?');" class="m-0 p-0">
                  <input type="hidden" name="hidden_eli" value="<?php echo htmlspecialchars($datos['cod_depto']); ?>" />
                  <button type="submit" name="btn_eli" class="btn btn-outline-danger btn-icon" title="Eliminar">
                    <i class="bi bi-trash3-fill"></i>
                  </button>
                </form>
                <form action="form_depa.php" method="post" class="m-0 p-0">
                  <input type="hidden" name="hidden_acta" value="<?php echo htmlspecialchars($datos['cod_depto']); ?>" />
                  <button type="submit" name="btn_act" class="btn btn-outline-success btn-icon" title="Editar">
                    <i class="bi bi-pencil-square"></i>
                  </button>
                </form>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
