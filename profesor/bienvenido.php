<?php
    include("../database/abrir_conexion.php");

    if(isset($_POST['boton'])) {
        $clases = $_POST['clases'];
        $fecha = $_POST['fecha'];
        $radio1 = $_POST['radio1'];
        $id_alumno = $_POST['id_alumno'];
        $id_profesor = $_POST['id_profesor'];
        $id_materia = $_POST['id_materia'];

        if($clases == "" || $fecha == "" || $radio1 == "" || $id_alumno == "" || $id_profesor == "" || $id_materia == ""){
            echo '<div class="alert alert-danger" role="alert">
                Rellene los campos
            </div>';
        } else {
            mysqli_query($conexion, "INSERT INTO $clases(fecha_dictado, estado, alumno_id, profesor_id, materia_id) 
            VALUES ('$fecha','$radio1','$id_alumno','$id_profesor','$id_materia'");
            echo '<div class="alert alert-success" role="alert">
                    Guardado exitosamente.
                </div>';
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- INICIANDO BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- CERRANDO BOOTSTRAP -->
    <!--ABRIENDO GOOGLE FONT-->
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Rubik+Bubbles&display=swap" rel="stylesheet">
    <!--CERRANDO GOOGLE FONT-->
    <title>Document</title>
    <link rel="stylesheet" href="../css/rellenar.css">
    <link rel="stylesheet" href="../css/alumno.css">
    <link rel="stylesheet" href="../css/crear_clases_profesor.css">
</head>
<body>
    <?php 
        if (isset($_POST['btn-entrar'])) {
        include ('../database/abrir_conexion.php');
        

        $nombre = $_POST['nombre'];
        $password = $_POST['contrasenia'];

        if($nombre == "" || $password == "" ) {
            echo '<div class="alert alert-danger" id="rellenar" role="alert">
            <center><p id="rellenar_campos">Rellene los campos<a href="../index.php" class="alert-link"> INICIAR SESION.</a></p></center>
          </div>';
        } else {
            $q = "SELECT COUNT(*) AS contar FROM $tabla4 WHERE nombre = '$nombre' AND contrasenia = '$password'";
            $consulta = mysqli_query($conexion, $q);
            $array = mysqli_fetch_array($consulta);
            
            if($array['contar'] > 0) {
                echo "<center><h1>Bienvenido $nombre</h1></center>";
                echo "<div class='menu'>
                    <div class='parrafos'> 
                        <a href='bienvenido.php'><p>Consulta y carga de clases</p><a>
                        <a href='consulta_de_sueldo.php'><p>Consulta de sueldo</p><a>
                    </div>
                </div>";
                echo '<div>
                    <form action="echo htmlspecialchars($_SERVER["PHP_SELF"])" method="POST">
                        <div>
                            <input type="text" name="clases" id="nombre" placeholder="Clases">
                            <input type="date" name="fecha" id="fecha">
                            <div id="radios">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" id="radio1">
                                    <label class="form-check-label" for="radio1">
                                        Completado
                                    </label>
                                </div>
                                <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio1" id="radio1">
                                        <label class="form-check-label" for="radio1">
                                            Cancelado
                                        </label>
                                </div>
                           </div>
                           <input type="number" name="id_alumno" id="alumno" placeholder="Alumno">
                           <input type="number" name="id_profesor" id="profesor" placeholder="Profesor">
                           <input type="number" name="id_materia" id="materia" placeholder="Materia">
                            <button type="submit" class="btn btn-primary" id="btn" name="boton">Guardar</button>
                        </div>
                    </form>
                </div>';
            } else {
            echo '<div class="alert alert-danger" id="completar" role="alert">
                    <center><p id="completar_campos">Datos incorrectos<a href="../index.php" class="alert-link"> INICIAR SESION.</a></p></center>
                </div>';
            }
        }

        }
    ?>
    <?php 
        
    ?>
</body>
</html>