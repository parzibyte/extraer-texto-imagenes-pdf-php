<?php

# Incluir autoload
include "vendor/autoload.php";

$parseador = new \Smalot\PdfParser\Parser();
$nombreDocumento = "6-imagenes.pdf";
$documento = $parseador->parseFile($nombreDocumento);

$paginas = $documento->getPages();
foreach ($paginas as $indice => $pagina) {
    printf("<h1>Página #%02d</h1>", $indice + 1);
    $texto = $pagina->getText();
    echo "<pre>";
    echo $texto;
    echo "</pre>";

}

$imagenes = $documento->getObjectsByType('XObject', 'Image');
foreach ($imagenes as $imagen) {
    printf("<h1>Una imagen</h1><img src=\"data:image/jpg;base64,%s\"/>", base64_encode($imagen->getContent()));
}
