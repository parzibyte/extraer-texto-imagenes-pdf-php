<?php

# Incluir autoload
include "vendor/autoload.php";

$parseador = new \Smalot\PdfParser\Parser();
$nombreDocumento = "6-imagenes.pdf";
$documento = $parseador->parseFile($nombreDocumento);

$imagenes = $documento->getObjectsByType('XObject', 'Image');
$contador = 0; # Un índice
foreach ($imagenes as $imagen) {
    file_put_contents(sprintf("Imagen_%02d.jpg", $contador + 1), $imagen->getContent());
    $contador++;
}
