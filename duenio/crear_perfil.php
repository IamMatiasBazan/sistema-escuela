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
</head>
<body>
    <center><h1>Crear y asignarle perfil</h1></center>
    <div class='menu'>
        <div class='parrafos'> 
            <a href='crear_perfil.php'><p>Crear y asignarles el perfil</p></a>
            <a href='cargar_materias.php'><p>Cargar y consulta de las materias</p></a>
            <a href='consulta_pagar_alumno.php'><p>Consulta el monto a pagar a los alumno</p></a>
            <a href='consulta_pagar_profesores.php'><p>Consulta el monto a pagar a los profesores</p></a>
            <a href='consultar_clases.php'><p>Consultar clases de profesores y alumno<p></a>
        </div>
    </div>
    
    <?php
        include ("../database/abrir_conexion.php");    
        if (isset($_POST['boton'])) {
            
            $nombre = $_POST['nombre'];
            $perfiles = $_POST['perfiles'];
            $contrasenia = $_POST['contrasenia'];

            $tablaUsuario = "INSERT INTO $tabla3(nombre) VALUES('$perfiles')";
            print($tablaUsuario);
            $q = mysqli_query($conexion, $tablaUsuario);

            if($q == 1){
                $tablaUsuario = "INSERT INTO $tabla4(nombre, rol_id, contrasenia) VALUES('$nombre','$perfiles','$contrasenia')";
                
                $q2 = mysqli_query($conexion, $tablaUsuario);
                echo '<div class="alert alert-success" role="alert">
                    <center>Guardado exitosamente</center>
                </div>';   
            } else {
                echo '<div class="alert alert-danger" role="alert">
                    <center>Falla al guardar</center>
                </div>';    
            }
        }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <div>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            <select name="perfiles" id="perfil">
                <option value="1">Due??o</option>
                <option value="2">Profesor</option>
                <option value="3">Alumno</option>
            </select>
            <input type="text" name="contrasenia" id="password" placeholder="Password">
            <button type="submit" class="btn btn-primary" id="btn" name="boton">Guardar</button>
        </div>
    </form>

</body>
</html>