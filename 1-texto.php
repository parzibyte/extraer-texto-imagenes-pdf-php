<?php

# Incluir autoload
include "vendor/autoload.php";

$parseador = new \Smalot\PdfParser\Parser();
$nombreDocumento = "6-imagenes.pdf";
$documento = $parseador->parseFile($nombreDocumento);

$texto = $documento->getText();
echo "<pre>";
echo $texto;
echo "</pre>";
