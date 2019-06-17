<?php

# Incluir autoload
include "vendor/autoload.php";

$parseador = new \Smalot\PdfParser\Parser();
$documentos = [
    "2.1-textoEstilo.pdf",
    "Ensayo.pdf",
    "6-imagenes.pdf",
];
foreach ($documentos as $documento) {
    printf("<h1>Documento %s</h1>", $documento);

    $documento = $parseador->parseFile($documento);

    $paginas = $documento->getPages();
    foreach ($paginas as $indice => $pagina) {
        printf("<h2>Página #%02d</h2>", $indice + 1);
        $texto = $pagina->getText();
        echo "<pre>";
        echo $texto;
        echo "</pre>";
    }
}
