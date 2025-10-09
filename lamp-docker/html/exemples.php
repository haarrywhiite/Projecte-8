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

echo '</body></html>';

// $var será de tipo int
$var = 1;
// Sin embargo $var2 al estar entre comillas se considerará de tipo string
$var2 = '1';
// También podemos crear variables de tipo float como se ve en $var3
$var3 = 1.1;

print_r($var);
print_r($var2);
print_r($var3);

var_dump($var);
var_dump($var2);
var_dump($var3);

?>