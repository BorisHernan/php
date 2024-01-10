<?php
include("c.php");

// Inicializar variables
$dni_buscar = '';
$resultados = [];

// Verificar si se ha enviado el formulario de búsqueda
if (isset($_POST['buscar'])) {
    $dni_buscar = $_POST['dni'];

    // Validar que el DNI tenga exactamente 8 dígitos
    if (strlen($dni_buscar) === 8 && is_numeric($dni_buscar)) {
        // Consulta SQL con la cláusula WHERE para filtrar por DNI
        $query = "SELECT * FROM estudiantes WHERE dni = '$dni_buscar'";
        $data = mysqli_query($conexion, $query);

        if (!$data) {
            die("Error al realizar la consulta: " . mysqli_error($conexion));
        }

        // Almacenar los resultados de la consulta en un array
        while ($consulta = mysqli_fetch_array($data)) {
            $resultados[] = $consulta;
        }
    } else {
        // Mostrar mensaje de error si el DNI no tiene 8 dígitos
        $error_message = "El DNI debe tener exactamente 8 dígitos.";
    }
} else {
    // Si no se ha enviado el formulario, obtener todos los estudiantes
    $data = mysqli_query($conexion, "SELECT * FROM estudiantes");

    if (!$data) {
        die("Error al realizar la consulta: " . mysqli_error($conexion));
    }

    // Almacenar los resultados de la consulta en un array
    while ($consulta = mysqli_fetch_array($data)) {
        $resultados[] = $consulta;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alumnos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="perfil">
    <h1 class="display-4 text-center my-5">Información del Alumno</h1>
    
    <!-- Formulario de búsqueda por DNI -->
    <form method="post" class="text-center mb-3">
        <label for="dni">Buscar por DNI (8 dígitos):</label>
        <input type="text" name="dni" id="dni" pattern="\d{8}" title="El DNI debe tener 8 dígitos" required>
        <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>
    </form>

    <?php
    if (isset($error_message)) {
        echo '<p class="text-danger">' . $error_message . '</p>';
    } else {
        foreach ($resultados as $resultado) {
    ?>      
            <div class="resultados">
                <div  class="label1">
                <label><strong>DNI:</strong></label>
                <p><?php echo $resultado['dni']; ?></p>
                </div>
                <div  class="label2">
                <label><strong>NOMBRES COMPLETOS:</strong></label>
                <p><?php echo $resultado['apenom']; ?></p>
                </div>
                <div  class="label3">
                <label><strong>NIVEL EDUCATIVO:</strong></label>
                    <div>
                        <?php
                            $nivel = $resultado['nivel'];
                            
                            if ($nivel == 'P') {
                                echo '<p>Primaria</p>';
                            } elseif ($nivel == 'S') {
                                echo '<p>Secundaria</p>';
                            } else {
                                // Manejar otros casos si es necesario
                                echo '<p>Otro Nivel</p>';
                            }
                        ?>
                    </div>
                </div>
                <div  class="label4">
                <label><strong>GRADO :</strong></label>
                <p><?php echo $resultado['grado']; ?></p>
                </div>
                <div  class="label5">
                <label><strong>SECCIÓN :</strong></label>
                <p><?php echo $resultado['seccion']; ?></p>
                </div>
                <div  class="label6">
                <label><strong>FECHA DE NACIMIENTO :</strong></label>
                <p><?php echo $resultado['fecnac']; ?></p>
                </div>
                <div  class="label7">
                <label><strong>GENERO :</strong></label>
                    <div>
                        <?php
                            $nivel = $resultado['sexo'];
                            
                            if ($nivel == 'M') {
                                echo '<p>Masculino</p>';
                            } elseif ($nivel == 'F') {
                                echo '<p>Femenino</p>';
                            } else {
                                // Manejar otros casos si es necesario
                                echo '<p>Otro Nivel</p>';
                            }
                        ?>
                    </div>
                </div>
                <div class="container">
                <div  class="label8">
                <label><strong>DIRECCIÓN :</strong></label>
                <p><?php echo $resultado['direccion']; ?></p>
                </div>
                <div  class="label9">
                <label><strong>DISTRITO :</strong></label>
                <p><?php echo $resultado['distrito']; ?></p>
                </div>
                <div  class="label10">
                <label><strong>COLEGIO DE PROCEDENCIA :</strong></label>
                <p><?php echo $resultado['procedencia']; ?></p>
                </div>
                <div class="label11">
                <label><strong>TELEFONO DEL ALUMNO :</strong></label>
                    <p>
                        <?php
                        if (empty($resultado['celularA'])) {
                            echo 'No proporcionó número de teléfono';
                        } else {
                            echo $resultado['celularA'];
                        }
                        ?>
                    </p>
                </div>
                <div  class="label12">
                <label><strong>CORREO DEL ALUMNO :</strong></label>
                <p>
                        <?php
                        if (empty($resultado['celularA'])) {
                            echo 'No proporcionó correo electronico';
                        } else {
                            echo $resultado['emailA'];
                        }
                        ?>
                    </p>
                </div>
                <div class="card containerimg" style="width: 18rem;">
                <img src="<?php echo $resultado['img'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>

            </div>



    <?php
        }
    }
    ?>

</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
