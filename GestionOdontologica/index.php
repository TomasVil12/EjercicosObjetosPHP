<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Odontológica</title>
</head>

<body>
    <?php
    
    require_once 'Controlador/Controlador.php';
    require_once 'Modelo/GestorCita.php';
    require_once 'Modelo/Cita.php';
    require_once 'Modelo/Paciente.php';
    require_once 'Modelo/Conexion.php';

    
    $controlador = new Controlador();

    
    if (isset($_GET["accion"])) {
        $accion = $_GET["accion"];

        
        switch ($accion) {
            case "asignar":
                $controlador->verPagina('Vista/html/asignar.php');
                break;

            case "consultar":
                $controlador->verPagina('Vista/html/consultar.php');
                break;

            case "cancelar":
                $controlador->verPagina('Vista/html/cancelar.php');
                break;

            case "guardarCita":
                $controlador->agregarCita(
                    $_POST["asignarDocumento"],
                    $_POST["medico"],
                    $_POST["fecha"],
                    $_POST["hora"],
                    $_POST["consultorio"]
                );
                break;

            case "consultarCita":
                $controlador->consultarCitas($_POST["consultarDocumento"]);
                break;

            case "cancelarCita":
                $controlador->cancelarCitas($_POST["cancelarDocumento"]);
                break;

            case "consultarPaciente":
                $controlador->consultarPaciente($_GET["documento"]);
                break;

            case "ingresarPaciente":
                $controlador->agregarPaciente(
                    $_GET["PacDocumento"],
                    $_GET["PacNombres"],
                    $_GET["PacApellidos"],
                    $_GET["PacNacimiento"],
                    $_GET["PacSexo"]
                );
                break;

            default:
                echo "<h2>Acción no reconocida</h2>";
                break;
        }
    } else {
        
        $controlador->verPagina('Vista/html/inicio.php');
    }
    ?>
</body>

</html>
