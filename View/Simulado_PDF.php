<?php
$titulo1 = 'Simulado - PDF';
$titulo2 = 'Simulado - Gerado';
require_once './Topo.phtml';

include '../Model/PDF.php';
Gerar_Gabarito(Gerar_PDF(2));



require_once './Rodape.html'; 
