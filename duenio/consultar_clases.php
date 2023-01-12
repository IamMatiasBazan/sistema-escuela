<?php 
    include("../database/abrir_conexion.php");
        
    $consulta = "SELECT * FROM $tabla2";
    $selectAlumno = "SELECT usuarios.nombre 
                    FROM usuarios 
                        JOIN roles on roles.id = usuarios.rol_id
                    where roles.nombre = 'Alumno'";
    $selectProfesor = "SELECT usuarios.nombre 
                        FROM usuarios 
                            JOIN roles on roles.id = usuarios.rol_id
                        where roles.nombre = 'Profesor'"; 
    $guardar = $conexion->query($consulta);
    $guardar2 = $conexion->query($selectAlumno);
    $guardar3 = $conexion->query($selectProfesor);    
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
    <link rel="stylesheet" href="../css/consulta_clases.css">
</head>
<body>
    <div class='menu'>
        <div class='parrafos'> 
            <a href='crear_perfil.php'><p>Crear y asignarles el perfil</p></a>
            <a href='cargar_materias.php'><p>Cargar y consulta de las materias</p></a>
            <a href='consulta_pagar_alumno.php'><p>Consulta el monto a pagar a los alumno</p></a>
            <a href='consulta_pagar_profesores.php'><p>Consulta el monto a pagar a los profesores</p></a>
            <a href='consultar_clases.php'><p>Consultar clases de profesores y alumno<p></a>    
        </div>
    </div>
        <div class="selects">
            <h1>Consultar clases de alumnos y profesores</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <div class="materias">
                    <select name="materia" id="select">
                        <?php while($row = $guardar->fetch_assoc()){ ?>
                            <option><?php echo $row['nombre']?></option>
                        <?php } ?>
                        </select>
                    </div>
                <div class="alumnos">
                    <select name="alumno" id="select">
                        <?php while($row = $guardar2->fetch_assoc()){ ?>
                            <option>
                                <?php echo $row['nombre']?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="year-desde">
                    <input type="date" id="year" name="anio-desde">
                </div>
                <div class="year-hasta">
                    <input type="date" id="year" name="anio-hasta">
                </div>
                <div class="profesores">
                    <select name="profesor" id="profesor">
                    <?php while($row = $guardar3->fetch_assoc()){ ?>
                        <option>
                                <?php echo $row['nombre']?>
                            </option>
                        <?php } ?>
                    </select>
                <div>
                <div id="btn">
                    <button class="btn btn-primary" type="submit" id="btn-filtrar" name="boton-filtrar">Filtrar</button>
                </div>
            </form>
        </div>

            <div class="col-sm-12 col-md-12 col-lg-12">
                <h3 class="text-center">Tabla</h3>
                <div class="table-responsive tabla-hover" id="TablaConsulta">
                    
                    <table class="table">
                        <thead>
                            <th class="text-center">Clases</th>
                            <th class="text-center">Profesor</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Estado</th>
                        </thead>
                    </table>
                </div>
            </div>
</body>
</html>