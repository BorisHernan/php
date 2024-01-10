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
    $data = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE dni = 77902058");



    if (!$data) {
        die("Error al realizar la consulta: " . mysqli_error($conexion));
    }



    // Almacenar los resultados de la consulta en un array
    while ($consulta = mysqli_fetch_array($data)) {
        $resultados[] = $consulta;
    }

    // Imprimir la información en la consola
    //$allData = mysqli_fetch_all($data, MYSQLI_ASSOC);
    //echo '<script>';
    //echo 'console.log(' . json_encode($allData) . ');';
    //echo '</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alumnos</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>
<body>

<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="alumnos.php" class="logo">
                    </a>
                    <ul class="nav">
                      <li><a href="alumnos.php" class="active">Asistencia De Entrada</a></li>
                      <li><a href="#">Asistencia De Salida</a></li>
                      <li><a href="#">Alumnos</a></li>
                      <li><a href="#">Listado de Asistencias</a></li>
                    </ul>   

                </nav>
            </div>
        </div>
    </div>
  </header>



<div class="perfil">
    <h1 class="containerform text-center body">Información del Alumno / Registro de Asistencia </h1>
    
    <!-- Formulario de búsqueda por DNI -->
    <form method="post" class="text-center mb-3 containerform">
        <label for="dni">Buscar por DNI (8 dígitos):</label>
        <input type="text" name="dni" id="dni" pattern="[0-9]{8}" title="El DNI debe tener 8 dígitos" required>
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
                <h5><strong>DNI:</strong><h5>
                <p class="texto-grande1"><?php echo $resultado['dni']; ?></p>
                </div>
                <div  class="label3">
                <h5><strong>NIVEL EDUCATIVO:</strong></h5>
                    <div class="texto-grande2">
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
                <h5><strong>GRADO :</strong><h5>
                <p class="texto-grande1"><?php echo $resultado['grado']; ?></p>
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
                </div>
                <div class="card containerimg" style="width: 14rem;">
                <img src="<?php echo $resultado['img'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><strong>NOMBRES COMPLETO :</strong></h5>
                    <p class="card-text"><?php echo $resultado['apenom']; ?></p>
                    <!-- Agrega el ID del estudiante como un atributo de datos -->
                    <a class="btn btn-primary asistio" data-idalum="<?php echo $resultado['id']; ?>">Asistió</a>
                    <a class="btn btn-primary no-asistio" data-idalum="<?php echo $resultado['id']; ?>">No Asistió</a>
                </div>
                </div>

                <script>
                $(document).ready(function(){
                    // Manejar clic en el botón "Asistió"
                    $(".asistio").click(function(){
                        var idalum = $(this).data('idalum');
                        // Realizar una solicitud AJAX al servidor
                        $.ajax({
                            type: 'POST',
                            url: 'asist.php', // Reemplaza 'tu_archivo_php.php' con el nombre de tu archivo PHP
                            data: { idalum: idalum, asis: 'A' },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    console.log(response.message);
                                    // Puedes realizar acciones adicionales después de registrar la asistencia
                                } else {
                                    console.error(response.message);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('Error en la solicitud AJAX:', status, error);
                            }
                        });
                    });

                    // Manejar clic en el botón "No Asistió"
                    $(".no-asistio").click(function(){
                        var idalum = $(this).data('idalum');
                        // Realizar una solicitud AJAX al servidor
                        $.ajax({
                            type: 'POST',
                            url: 'asist.php', // Reemplaza 'tu_archivo_php.php' con el nombre de tu archivo PHP
                            data: { idalum: idalum, asis: 'F' },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    console.log(response.message);
                                    // Puedes realizar acciones adicionales después de registrar la asistencia
                                } else {
                                    console.error(response.message);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('Error en la solicitud AJAX:', status, error);
                            }
                        });
                    });
                });
                </script>

            </div>



    <?php
        }
    }
    ?>

</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/owl-carousel.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
