<?php 
    $nombre = $_GET['txt_nombre'];
    //intval convertir a numero entero
    $edad = (int) $_GET['txt_edad'] ;
    //floatval convertir a float
    $sueldo=(float) $_GET['txt_sueldo'];
    echo "Este es mi primer codigo PHP";
    echo "<br>Bienvenido: ". $nombre;
    echo "<br> Edad: ". $edad;
    echo ("<br> Sueldo: ". $sueldo);

    echo "<br>La raiz cuadrada de la edad es: ". sqrt($edad);
    echo "<br>Un aleatorio entre 1 y la edad ingresada: ". mt_rand(1,$edad);
    echo "<br>Un aleatorio entre 1 y la edad ingresada: ". random_int(1,$edad);
    echo "<br>la edad al cuadrado es: ". pow($edad, 2);
    echo "<br>la edad al cubo es: ". pow($edad, 3);
    
    if ($edad<18) {
        echo "<br>Es menor de edad";
    } else {
        echo "<br>Es mayor de edad";
    }
    echo "<br><br>Con negación";
    //! es negación
    if(!($edad<18)){
        echo "<br> es mayor de edad";
    }else{
        echo "<br> es menor de edad";
    }

    echo "<br><br><br>";
    echo "Números continuos desde el 1 hasta la edad";
    for ($i=1; $i <=$edad ; $i++) { 
        echo "<br>".$i;
    }
    echo "<br><br><br>";
    echo "Números de forma inversa desde la edad hasta 1";
    for ($i=$edad; $i>=1; $i--) { 
        echo "<br>".$i;
    }
    

    /* 
    echo "<br>";
    var_dump($nombre);
    echo "<br>";
    var_dump($edad);
    echo "<br>";
    var_dump($sueldo);
    */
?>
<br>
<a href="../index.php">Regresar</a>