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


            <label for="dpi" class="form-label">Dpi</label>
            <input type="text" name="dpi" id="dpi" class="form-control" required>

            <label for="txt_apellido" class="form-label">Apellido</label>
            <input type="text" name="txt_apellido" id="txt_apellido" class="form-control" required>

            <label for="txt_nombre" class="form-label">Nombre</label>
            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" required>

            <label for="txt_direccion" class="form-label">Dirección</label>
            <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" required>

            <label for="txt_telefono_casa" class="form-label">Teléfono Casa</label>
            <input type="text" name="txt_telefono_casa" id="txt_telefono_casa" class="form-control" required>

            <label for="txt_telefono_celular" class="form-label">Teléfono Celular</label>
            <input type="text" name="txt_telefono_celular" id="txt_telefono_celular" class="form-control" required>

            <label for="txt_email" class="form-label">Email</label>
            <input type="email" name="txt_email" id="txt_email" class="form-control" required>
            <label for="txt_fechanacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="txt_fechanacimiento" id="txt_fechanacimiento" class="form-control" required>

            <label for="nivel_acad">Nivel académico</label>
            <input type="text" name="txt_nivel_academico" id="txt_nivel_academico" class="form-control" required>

            <label for="txt_cod_municipio" class="form-label">Código de Municipio</label>
            <input type="text" name="txt_cod_municipio" id="txt_cod_municipio" class="form-control" required>

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

        <table class="table table-bordered table-danger text-center w-75 mx-auto fs-5">
      <thead class="table-dark">
        <tr>
          <th>dpi</th>
          <th>Apellido</th>
          <th>Nombre</th>
          <th>direccion</th>
          <th>Teléfono Casa</th>
          <th>Teléfono Celular</th>
          <th>Email</th>
          <th>Fecha de Nacimiento</th>
          <th>Nivel Académico</th>
          <th>Código de Municipio</th>
          <th>Acciones</th>

        </tr>
      </thead>
      <tbody>
        <?php while ($datos = mysqli_fetch_assoc($ejecutar)) { ?>
          <tr>
            <td><?php echo htmlspecialchars($datos['dpi']); ?></td>
            <td><?php echo htmlspecialchars($datos['apellido']); ?></td>
            <td><?php echo htmlspecialchars($datos['nombre']); ?></td>
            <td><?php echo htmlspecialchars($datos['direccion']); ?></td>
            <td><?php echo htmlspecialchars($datos['tel_casa']); ?></td>
            <td><?php echo htmlspecialchars($datos['tel_movil']); ?></td>
            <td><?php echo htmlspecialchars($datos['email']); ?></td>
            <td><?php echo htmlspecialchars($datos['fechanac']); ?></td>
            <td><?php echo htmlspecialchars($datos['cod_nivel_acad']); ?></td>
            <td><?php echo htmlspecialchars($datos['cod_muni']); ?></td>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
</body>
</html>