<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Listado de Niveles Académicos</title>
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
      padding: 2rem;
      margin-top: 3rem;
      background: #fff;
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
    h2 {
      color: #495057;
      font-weight: 700;
    }
    .btn-primary, .btn-success {
      font-weight: 600;
    }
  </style>
</head>
<body>

  <?php
    require_once("../basededatos/conexion.php");
    $sql = "SELECT * FROM nivelesacademicos";
    $ejecutar = mysqli_query($conexion, $sql);
  ?>

  <div class="container">
    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
      <h2>Listado de Niveles Académicos</h2>
      <a href="../index.php" class="btn btn-primary shadow-sm">
        <i class="bi bi-arrow-left-circle me-2"></i> Regresar
      </a>
    </div>

    <div class="card">
      <div class="d-flex justify-content-center mb-4">
        <button type="button" class="btn btn-success btn-lg shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="bi bi-plus-lg me-2"></i> Agregar Nivel
        </button>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title fs-5" id="exampleModalLabel">Nuevo Nivel</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
              <form action="crud_nivel.php" method="post" novalidate>
                <div class="mb-3">
                  <label for="txt_codigo" class="form-label fw-semibold">Código</label>
                  <input type="number" name="txt_codigo" id="txt_codigo" class="form-control" min="1" required />
                </div>
                <div class="mb-3">
                  <label for="txt_nombre" class="form-label fw-semibold">Nombre</label>
                  <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" required />
                </div>
                <div class="mb-3">
                  <label for="txt_nivel" class="form-label fw-semibold">Descripción</label>
                  <input type="text" name="txt_nivel" id="txt_nivel" class="form-control" required />
                </div>
                <button type="submit" class="btn btn-success w-100 fw-bold" name="btn_insertar" id="btn_insertar">
                  <i class="bi bi-check2-circle me-2"></i> Agregar Nivel
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

      <!-- Tabla de niveles -->
      <table class="table table-bordered table-hover text-center align-middle fs-5 mb-0">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nivel</th>
            <th>Descripción</th>
            <th style="width: 140px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($datos = mysqli_fetch_assoc($ejecutar)) : ?>
            <tr>
              <td><?php echo htmlspecialchars($datos['cod_nivel_acad']); ?></td>
              <td><?php echo htmlspecialchars($datos['nombre']); ?></td>
              <td><?php echo htmlspecialchars($datos['descripcion']); ?></td>
              <td class="d-flex justify-content-center gap-3">
                <form action="crud_nivel.php" method="post" onsubmit="return confirm('¿Estás seguro de eliminar este nivel?');" class="m-0 p-0">
                  <input type="hidden" name="hidden_eli" value="<?php echo htmlspecialchars($datos['cod_nivel_acad']); ?>" />
                  <button type="submit" name="btn_eli" class="btn btn-outline-danger btn-icon" title="Eliminar">
                    <i class="bi bi-trash3-fill"></i>
                  </button>
                </form>
                <form action="form_acd_nivel.php" method="post" class="m-0 p-0">
                  <input type="hidden" name="hidden_acta" value="<?php echo htmlspecialchars($datos['cod_nivel_acad']); ?>" />
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
