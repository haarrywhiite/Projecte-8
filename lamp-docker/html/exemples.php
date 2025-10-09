<?php
// Start HTML output
echo '<!DOCTYPE html>
<html>
<head>
    <title>PHP Examples</title>
    <style>
        .example {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .example h2 {
            color: #333;
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .example pre {
            background-color: #eee;
            padding: 10px;
            border-radius: 3px;
        }
    </style>
</head>
<body>';
?>

<?php
// Ejemplo 1: Sintaxis básica
echo '<div class="example">';
echo '<h2>Ejemplo 1: Sintaxis básica</h2>';
echo "<h1>Noticias para desarrolladores</h1>";
echo "Los mejores ejemplos de PHP<br>";
echo '</div>';

// Ejemplo 2: Comentarios
echo '<div class="example">';
echo '<h2>Ejemplo 2: Comentarios</h2>';
// Comentario de una sola línea
# Otro comentario de una sola línea
/*
Este es un comentario
de múltiples líneas
*/
echo '<pre>';
echo "// Comentario de una sola línea\n";
echo "# Otro comentario de una sola línea\n";
echo "/*\nEste es un comentario\nde múltiples líneas\n*/";
echo '</pre>';
echo '</div>';

// Ejemplo 3: Sensibilidad de mayúsculas y minúsculas
echo '<div class="example">';
echo '<h2>Ejemplo 3: Sensibilidad de mayúsculas y minúsculas</h2>';
ECHO "¡Hola!<br>";
echo "Bienvenido a Noticias para desarrolladores<br>";
EcHo "Disfruta de todos los artículos sin publicidad<br>";

$nombre = "Maria";
echo "¡Hola! Mi nombre es " . $nombre . "<br>";
// Las siguientes líneas generarían error porque las variables son sensibles a mayúsculas
// echo "¡Hola! Mi nombre es " . $NOMBRE . "<br>";
// echo "¡Hola! Mi nombre es " . $NomBre . "<br>";
echo '</div>';

// Ejemplo 4: Variables
echo '<div class="example">';
echo '<h2>Ejemplo 4: Variables</h2>';
$saludo = "¡Hola!";
$mes = 8;
$ano = 2019;
echo '<pre>';
echo '$saludo = "¡Hola!";<br>';
echo '$mes = 8;<br>';
echo '$ano = 2019;<br>';
echo '</pre>';
echo '</div>';

// Ejemplo 5: Tipos de datos
echo '<div class="example">';
echo '<h2>Ejemplo 5: Tipos de datos</h2>';
// Cadena
$texto = "¡Hola!";
// Entero
$entero = 5;
// Float
$flotante = 5.01;
// Booleano
$verdadero = true;
$falso = false;
// Arreglo
$colores = array("Magenta", "Amarillo", "Cian");
// NULL
$saludo = null;
echo '<pre>';
echo '$texto = "¡Hola!"; // Cadena<br>';
echo '$entero = 5; // Entero<br>';
echo '$flotante = 5.01; // Float<br>';
echo '$verdadero = true; // Booleano<br>';
echo '$falso = false; // Booleano<br>';
echo '$colores = array("Magenta", "Amarillo", "Cian"); // Arreglo<br>';
echo '$saludo = null; // NULL<br>';
echo '</pre>';
echo '</div>';

// Ejemplo 6: Clase y Objeto
echo '<div class="example">';
echo '<h2>Ejemplo 6: Clase y Objeto</h2>';
class Coche {
    public $modelo; // Explicitly declare the property

    function __construct() { // Use modern constructor
        $this->modelo = "Tesla";
    }
}
$objeto_coche = new Coche();
echo $objeto_coche->modelo . "<br>";
echo '</div>';

// Ejemplo 7: Cadenas
echo '<div class="example">';
echo '<h2>Ejemplo 7: Cadenas</h2>';
$nombre = 'Maria';
$apellido = 'O\'Brian';
$cita = "Maria dijo: \"Quiero unas tostadas\", y luego salió corriendo.";
$saludo = "Hola $nombre<br>";
echo $saludo;
echo '</div>';

// Ejemplo 8: Funciones de cadenas
echo '<div class="example">';
echo '<h2>Ejemplo 8: Funciones de cadenas</h2>';
echo strlen("Noticias para desarrolladores") . "<br>"; // Longitud
echo str_word_count("Noticias para desarrolladores") . "<br>"; // Conteo de palabras
echo strrev("Noticias para desarrolladores") . "<br>"; // Invertir
echo strpos("Noticias para desarrolladores", "Noticias") . "<br>"; // Buscar
echo str_replace("freeCodeCamp", "Desarrollador", "Noticias del freeCodeCamp ") . "<br>"; // Reemplazar
echo '</div>';

// Ejemplo 9: Constantes
echo '<div class="example">';
echo '<h2>Ejemplo 9: Constantes</h2>';
define("freeCodeCamp", "Aprende a programar y ayuda a organizaciones sin ánimo de lucro", false);
echo freeCodeCamp . "<br>";

class Humano {
    const TIPO_MASCULINO = 'm';
    const TIPO_HEMBRA = 'f';
    const TIPO_DESCONOCIDO = 'u';
}
echo Humano::TIPO_MASCULINO . "<br>";
echo '</div>';

// Ejemplo 10: Operadores
echo '<div class="example">';
echo '<h2>Ejemplo 10: Operadores</h2>';
echo (1 <=> 1) . "<br>"; // 0
echo (1 <=> 2) . "<br>"; // -1
echo (2 <=> 1) . "<br>"; // 1
echo '</div>';

// Ejemplo 11: Declaraciones If/Else
echo '<div class="example">';
echo '<h2>Ejemplo 11: Declaraciones If/Else</h2>';
$condicion = true;
if ($condicion) {
    echo "La condición es verdadera<br>";
} else {
    echo "La condición es falsa<br>";
}
echo '</div>';

// Ejemplo 12: Operador ternario
echo '<div class="example">';
echo '<h2>Ejemplo 12: Operador ternario</h2>';
$usuario = "Antonio";
$mensaje = 'Hola ' . ($usuario != NULL ? $usuario : 'invitado') . "<br>";
echo $mensaje;
echo '</div>';

// Ejemplo 13: Switch
echo '<div class="example">';
echo '<h2>Ejemplo 13: Switch</h2>';
$i = "código";
switch ($i) {
    case "libre":
        echo "i es free<br>";
        break;
    case "código":
        echo "i es code<br>";
        break;
    case "campamento":
        echo "i es camp<br>";
        break;
    default:
        echo "i es freecodecamp<br>";
        break;
}
echo '</div>';

// Ejemplo 14: Bucle For
echo '<div class="example">';
echo '<h2>Ejemplo 14: Bucle For</h2>';
for ($indice = 0; $indice < 5; $indice++) {
    echo "Contador de bucle actual " . $indice . ".<br>";
}
echo '</div>';

// Ejemplo 15: Bucle While
echo '<div class="example">';
echo '<h2>Ejemplo 15: Bucle While</h2>';
$index = 10;
while ($index >= 8) {
    echo "El índice es " . $index . ".<br>";
    $index--;
}
echo '</div>';

// Ejemplo 16: Bucle Do...While
echo '<div class="example">';
echo '<h2>Ejemplo 16: Bucle Do...While</h2>';
$indice = 3;
do {
    echo "Índice: " . $indice . ".<br>";
    $indice--;
} while ($indice > 0);
echo '</div>';

// Ejemplo 17: Función simple
echo '<div class="example">';
echo '<h2>Ejemplo 17: Función simple</h2>';
function di_hola($amigo) {
    return "Hola " . $amigo . "!<br>";
}
echo di_hola('Antonio');
echo '</div>';

// Ejemplo 18: Arreglo indexado
echo '<div class="example">';
echo '<h2>Ejemplo 18: Arreglo indexado</h2>';
$lista_de_la_compra = array("huevos", "leche", "queso");
echo $lista_de_la_compra[0] . "<br>";
echo '</div>';

// Ejemplo 19: Arreglo asociativo
echo '<div class="example">';
echo '<h2>Ejemplo 19: Arreglo asociativo</h2>';
$puntuacion_alumno = array("Antonio" => 83, "Jose" => 93, "Pedro" => 90);
echo $puntuacion_alumno['Antonio'] . "<br>";
echo '</div>';

// Ejemplo 20: Arreglo multidimensional
echo '<div class="example">';
echo '<h2>Ejemplo 20: Arreglo multidimensional</h2>';
$alumnos = array(
    array("nombre" => "Antonio", "puntuacion" => 83, "apellido" => "Garcia"),
    array("nombre" => "Jose", "puntuacion" => 92, "apellido" => "Sevilla")
);
echo $alumnos[0]['nombre'] . "<br>";
echo '</div>';

// Ejemplo 21: Ordenación de arreglos
echo '<div class="example">';
echo '<h2>Ejemplo 21: Ordenación de arreglos</h2>';
$freecodecamp = array("free", "code", "camp");
sort($freecodecamp);
echo '<pre>';
print_r($freecodecamp);
echo '</pre>';

$freecodecamp_assoc = array("cero" => "free", "uno" => "code", "dos" => "camp");
ksort($freecodecamp_assoc);
echo '<pre>';
print_r($freecodecamp_assoc);
echo '</pre>';
echo '</div>';

echo '</body></html>';
?>