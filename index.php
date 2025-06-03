<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #a1c4fd, #c2e9fb);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Base de Datos</span>
        </div>
    </nav>
    <div class="container text-center mt-5">
        <h1 class="mb-4 text-white">Menú Principal</h1>

        <div class="d-grid gap-3 col-6 mx-auto">
            <a href="regiones/vistaregiones.php" class="btn btn-outline-primary btn-lg">Regiones</a>
            <a href="municipios/municipios.php" class="btn btn-outline-success btn-lg">Municipios</a>
            <a href="departamentos/departamentos.php" class="btn btn-outline-danger btn-lg">Departamentos</a>
            <a href="nivelacademico/academico.php" class="btn btn-outline-secondary btn-lg">Nivel Academico</a>
            <a href="ciudadanos/ciudadanos.php" class="btn btn-outline-info btn-lg">Ciudadanos</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
