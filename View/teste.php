<?php
$titulo1 = 'Teste';
$titulo2 = 'Bem vindo';
require_once './Topo.phtml';
?>
<?php
if (isset($_POST['Quest'])) {
    $checked = $_POST['Quest'];
    for ($i = 0; $i < count($checked); $i++) {
        echo "Selected " . $checked[$i] . "<br/>";
    }
} else {
    echo 'NADA SELECIONADO!!!';
}
?>

Aqui é todo o corpo particular do Sistema por página!

<?php

include '../Model/PDF.php';

$provas = Provas_simulado(2);
$quest = Questoes_prova(Provas_simulado(2));
$alter = Alternativas_Questao(2);

print_r($provas);

echo '<br/>';

print_r($quest);


echo '<br/>';

print_r($alter);

echo '<br/>';
$i = 0;
$j = 0;
$z = 0;
while(isset($provas[$i]) AND $provas[$i] != NULL){
    echo 'Prova '.$provas[$i]. ': Questões[ '; 
    //SELECT todos os dados da prova
    
    
    while(isset($quest[$provas[$i]][$j]) AND $quest[$provas[$i]][$j] != NULL){
        echo '<'.$quest[$provas[$i]][$j]."> Alternativas{"; 
        //SELECT todos os dados das Questões
    
        
        while(isset($alter[$provas[$i]][$j][$z]) AND $alter[$provas[$i]][$j][$z] != NULL){
            echo $alter[$provas[$i]][$j][$z].", ";    
            //SELECT todos os dados das Alternativas
            
            
            $z++;
        }
        echo '}';
        $j++;
    }
        $j=0;
        echo ']<br/>';
    $i++;
}

echo '<BR/><BR/><BR/>';

$gab = Gerar_PDF(2);

print_r($gab);

Gerar_Gabarito($gab);
echo '<BR/><BR/><BR/>';
?>

<?php require_once './Rodape.html'; ?>