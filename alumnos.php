<?php
include("c.php");

$dni_buscar = '';
$resultados = [];
$error_message = '';

if (isset($_POST['buscar'])) {
    $dni_buscar = $_POST['dni'];

    if (strlen($dni_buscar) === 8 && is_numeric($dni_buscar)) {
        $query = "SELECT * FROM estudiantes WHERE dni = ?";
        

        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt, "s", $dni_buscar);
        mysqli_stmt_execute($stmt);

        $data = mysqli_stmt_get_result($stmt);

        if (!$data) {
            die("Error al realizar la consulta: " . mysqli_error($conexion));
        }

        while ($consulta = mysqli_fetch_array($data)) {
            $resultados[] = $consulta;
        }
    } else {
        $error_message = "El DNI debe tener exactamente 8 dígitos.";
    }

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
</head>

<body>
<link rel="stylesheet" href="css/styles.css">
<div class="fieldset">    
<fieldset>
    <legend id="fecha"></legend>
    <h2 id="reloj"></h2>
</fieldset>
</div>  

  <script src="js/ejercicio.js"></script>


  <form method="post" class="text-center mb-3 containerform">
    <label for="dni">Buscar por DNI (8 dígitos):</label>
    <input type="text" name="dni" id="dni" pattern="[0-9]{8}" title="El DNI debe tener 8 dígitos" oninput="checkLength()" required>
    <button class="btn btn-primary" type="submit" name="buscar" id="buscarBtn" style="display:none;">Buscar</button>
</form>

<script>
    function checkLength() {
        var dniInput = document.getElementById('dni');
        var buscarBtn = document.getElementById('buscarBtn');

        if (dniInput.value.length === 8) {
            buscarBtn.click();

        }
    }
</script>


<div class="perfil">
    <h1 class="containerform text-center body">Información del Alumno / Registro de Asistencia </h1>
    
    <div id="resultadosContainer" class="resultados">
        <?php
        if ($error_message !== '') {
            echo '<p class="text-danger">' . $error_message . '</p>';
        } else {
            foreach ($resultados as $resultado) {
        ?>
            <div class="d-flex justify-content-between">
                <div class="card contenedor" style="width: 14rem;">
                <h3 class="card separator"><strong>DNI </strong><h4>
                
                <h4 class="separator"><?php echo $resultado['dni']; ?></h4>
                <h4 class="card separator" ><strong>NOMBRE COMPLETO </strong><h4>
                    <h4 class="separator"><?php echo $resultado['apenom']; ?></h4>
                </div>
                <div class="card separator" style="width: 14rem;">
                <h3 class="card separator"><strong>NIVEL EDUCATIVO </strong></h3>
                    <div>
                        <?php
                            $nivel = $resultado['nivel'];
                            
                            if ($nivel == 'P') {
                                echo '<h4 class="separator" >Primaria</h4>';
                            } elseif ($nivel == 'S') {
                                echo '<h4 class="separator" >Secundaria</h4>';
                            } else {
                                // Manejar otros casos si es necesario
                                echo '<h4 class="separator">Otro Nivel</h4>';
                            }
                        ?>
                    </div>
                <h3 class="card separator"  ><strong>GRADO :</strong><h3>
                <h4 class="separator" ><?php echo $resultado['grado']; ?></h4>
                <h3 class="card separator"  ><strong>SECCIÓN :</strong></h3>
                <h4 class="separator"><?php echo $resultado['seccion']; ?></h4>
                </div>

                <div class="card contenedor" style="width: 14rem;">
                <img src="<?php echo $resultado['img'] ?>" class="card-img-top" alt="...">
                <button class="btn btn-primary asistio" data-idalum="<?php echo $resultado['id']; ?>" id="buscarBtn1" style="display:none;">asitencia</button>
                </div>
            </div>
            </div>
    <?php
        }
    }
    ?>

            <script>
                function limpiarResultados() {
                    buscarBtn1.click();
                    document.getElementById('resultadosContainer').innerHTML = '';
                }

                setTimeout(limpiarResultados, 2000);
            </script>



            <script>
                $(document).ready(function(){
                    // Manejar clic en el botón "Asistió"
                $(".asistio").click(function(){
                    var idalum = $(this).data('idalum');

                    $.ajax({
                        type: 'POST',
                        url: 'asist.php', 
                        data: { idalum: idalum, asis: 'A' },
                         dataType: 'json',
                            success: function(response) {
                             if (response.success) {
                                console.log(response.message);
                                    
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

<script src="js/bootstrap.min.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/owl-carousel.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>


</body>
</html>

