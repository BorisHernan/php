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
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700;800&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.3.1/p5.min.js"></script>
    <script src="p5.min.js"></script>
</head>

<body>  
    <!-- CSS (estilos) -->
    <link rel="stylesheet" href="css/styles.css">

    <div  style="width: 14rem;">   
        <?php
        echo '<img src="img/galoisimg.png" alt="Descripción de la imagen" width="20">';
        ?>
        <h2 class="h2f">EVARISTE</h2>
        <h1 class="h1f" >GALOIS</h1>
        <h1 class="h1v2" >REGISTRO DE ASISTENCIAS</h1>
    </div>

    <!-- HTML (Estructura) -->

    <div id="contenedor-reloj">
        <!-- Se va a trabajar con multiples capas -->
        <div id="fondo">
        </div>
        <div id="hora-digital">
            <span id="texto-hora-digital">Cargando...</span>
        </div>
        <div id="manecillas">
            <svg id="puntos" width="300" height="300">
            </svg>
            <div id="horas">
                <svg width="300" height="300">
                    <line x1="150" y1="50" x2="150" y2="150" stroke="black" stroke-width="6" stroke-linecap="round" />
                </svg>
            </div>
            <div id="minutos">
                <svg width="300" height="300">
                    <line x1="150" y1="30" x2="150" y2="150" stroke="black" stroke-width="4" stroke-linecap="round" />
                </svg>
            </div>
            <div id="segundos">
                <svg width="300" height="300">
                    <line x1="150" y1="30" x2="150" y2="150" stroke="red" stroke-width="2" stroke-linecap="round" />
                </svg>

            </div>  

        </div>

    </div>

 

    <div class="fieldset">    
    <fieldset>
    <legend id="fecha"></legend>
    </fieldset> 
    </div>

    <!-- JS (Lógica) -->
    <script src="js/setup.js"> </script>

  <script src="js/ejercicio.js"></script>


  <form method="post" class="text-center mb-3 containerform ingre">
    <label for="dni">INSERTE DNI (8 dígitos)</label>
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
    
    <div id="resultadosContainer" class="resultados">
        <?php
        if ($error_message !== '') {
            echo '<p class="text-danger">' . $error_message . '</p>';
        } else {
            foreach ($resultados as $resultado) {
        ?>
                <h3 class="h3dni"><strong>DNI : </strong><h4>
                
                <h4 class="h4dni"><?php echo $resultado['dni']; ?></h4>
                <h4 class="h3alum" ><strong>ALUMNO : </strong><h4>
                    <h4 class="h4alum"><?php echo $resultado['apenom']; ?></h4>
                </div>

                <h3 class="h3gra"><strong>GRADO : </strong></h3>
                <h4 class="h4gra">
                    <?php 
                        $grado = $resultado['grado'];

                        switch ($grado) {
                            case 1:
                                echo "Primero";
                                break;
                            case 2:
                                echo "Segundo";
                                break;
                            case 3:
                                echo "Tercero";
                                break;
                            case 4:
                                echo "Cuarto";
                                break;
                            case 5:
                                echo "Quinto";
                                break;
                            default:
                                echo "Grado desconocido";
                        }
                    ?>
                </h4>
                <h3 class="h3sec"  ><strong>SECCIÓN : </strong></h3>
                <h4 class="h4sec">"<?php echo $resultado['seccion']; ?>"</h4>
                </div>

                <div class="imgh" style="width: 14rem;">
                <img src="<?php echo $resultado['img'] ?>" class="card-img-top" alt="...">
                <button class="btn btn-primary asistio" data-idalum="<?php echo $resultado['id']; ?>" id="buscarBtn1" style="display:none;">asitencia</button>
                </div>

    <?php
        }
    }
    ?>

            <script>
                function limpiarResultados() {
                    buscarBtn1.click();
                    var resultadosContainer = document.getElementById('resultadosContainer');
                    resultadosContainer.style.display = 'none';
                }

                setTimeout(limpiarResultados, 5000); // 5000 milisegundos = 5 segundos
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

