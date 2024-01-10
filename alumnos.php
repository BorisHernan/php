<?php
include("c.php");

$dni_buscar = '';
$resultados = [];
$error_message = '';

if (isset($_POST['buscar'])) {
    $dni_buscar = $_POST['dni'];

    if (strlen($dni_buscar) === 8 && is_numeric($dni_buscar)) {

        $query = "SELECT * FROM estudiantes WHERE TRIM(dni) = '$dni_buscar'";
        
        echo '<script>';
        echo 'console.log("Consulta SQL: ' . $query . '");';
        echo '</script>';
        
        $data = mysqli_query($conexion, $query);

        if (!$data) {
            die("Error al realizar la consulta: " . mysqli_error($conexion));
        }


        while ($consulta = mysqli_fetch_array($data)) {
            $resultados[] = $consulta;
        }
    } else {

        $error_message = "El DNI debe tener exactamente 8 dígitos.";
    }

    echo "Consulta SQL: $query <br>";
} 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
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
    </form>

    <?php
    if ($error_message !== '') {
        echo '<p class="text-danger">' . $error_message . '</p>';
    } else {
        foreach ($resultados as $resultado) {
    ?>      
            <div class="resultados">
            <div  class="label1">
                <h5><strong>DNI:</strong><h5>
                <p class="texto-grande1"><?php echo $resultado['dni']; ?></p>
                </div>
                <div  class="label2">
                <h5><strong>NOMBRES COMPLETO :</strong><h5>
                    <p class="card-text"><?php echo $resultado['apenom']; ?></p>
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

                <div class="card contenedor" style="width: 14rem;">
                <img src="<?php echo $resultado['img'] ?>" class="card-img-top" alt="...">

                    <!-- Agrega el ID del estudiante como un atributo de datos -->
                <!--    <a class="btn btn-primary asistio" data-idalum="<?php echo $resultado['id']; ?>">Asistió</a>
                   <a class="btn btn-primary no-asistio" data-idalum="<?php echo $resultado['id']; ?>">No Asistió</a>-->
                </div>
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

<!-- Script para buscar automáticamente después de ingresar los 8 dígitos del DNI -->
<script>
    $(document).ready(function(){
        $('#dni').on('input', function(){
            if ($(this).val().length === 8) {
                $('form').submit();
            }
        });
    });
</script>

</body>
</html>

