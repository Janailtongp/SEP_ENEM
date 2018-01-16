<?php

function Provas_simulado($idSimulado){
    $conn = F_conect();
    $result = mysqli_query($conn, "SELECT * from prova WHERE Simulado_idSimulado =".$idSimulado);
    $i = 0;
    $provas = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {
            $provas[$i] = $row['idProva'];
            $i++;
        }
    }
    $conn->close();
    return $provas;
}

function Questoes_prova($provas){
    $conn = F_conect();
    $qtdProv = count($provas);
    $quest = array();
    for($i=0; $i<$qtdProv; $i++){
        $ID_ = intval($provas[$i]);
        $result = mysqli_query($conn, "SELECT * from  questao_prova WHERE Prova_idProva =".$ID_);
        $j = 0;
        if (mysqli_num_rows($result)!=0) {
            while ($row = $result->fetch_assoc()){
                $quest[$provas[$i]][$j] = $row['Questao_idQuestao'];
                $j++;
            }
        }
    }
     return $quest;   
}

function Alternativas_Questao($idSimlado) {
    $conn = F_conect();
    $provas = Provas_simulado($idSimlado);
    $quest = Questoes_prova(Provas_simulado($idSimlado));
    $i = 0; $j = 0; $z=0; $alter = array();
    while(isset($provas[$i]) AND $provas[$i] != NULL){
       while(isset($quest[$provas[$i]][$j]) AND $quest[$provas[$i]][$j] != NULL){
                $result = mysqli_query($conn, "SELECT * from  alternativa WHERE Questao_idQuestao =".  intval($quest[$provas[$i]][$j]));
                if (mysqli_num_rows($result)!=0) {
                    while ($row = $result->fetch_assoc()){
                        $alter[$provas[$i]][$j][$z] = $row['idAlternativa'];
                        $z++;
                    }
                }   
            
            $j++;
        }
            $j=0;
        $i++;
    }
    return $alter;
}

function Gerar_PDF($idSimulado) {
$conn = F_conect();    
$Letra = array(
    0 => "A",
    1 => "B",
    2 => "C",
    3 => "D",
    4 => "E",
);
$gabarito = array();
$provas = Provas_simulado($idSimulado);
$quest = Questoes_prova(Provas_simulado($idSimulado));
$alter = Alternativas_Questao($idSimulado);
$i = 0; $j = 0; $z = 0; $n = 1;
 echo '<link rel="stylesheet" type="text/css" href="../assets/css/estilo.css">
       <div class="div-em-colunas">';
while(isset($provas[$i]) AND $provas[$i] != NULL){
     $result = mysqli_query($conn, "SELECT * from  prova WHERE idProva =".intval($provas[$i]));   
     if (mysqli_num_rows($result)!=0) {
            while ($row = $result->fetch_assoc()){
                echo '<div class="area">'.NomeArea($row['assunto']).'</div>';
            }
        } 
     
    while(isset($quest[$provas[$i]][$j]) AND $quest[$provas[$i]][$j] != NULL){
        $result = mysqli_query($conn, "SELECT * from  questao WHERE idQuestao =".intval($quest[$provas[$i]][$j]));   
        if (mysqli_num_rows($result)!=0) {
            while ($row = $result->fetch_assoc()){
                echo '<div class="questao"><div class="titulo">Questão '.$n.'</div>
                        <div class="enunciado">'.$row['enunciado'].'</div>';
            }
        } 
        $l = 0;
        while(isset($alter[$provas[$i]][$j][$z]) AND $alter[$provas[$i]][$j][$z] != NULL){
            $result = mysqli_query($conn, "SELECT * from  alternativa WHERE idAlternativa =".intval($alter[$provas[$i]][$j][$z]));   
            if (mysqli_num_rows($result)!=0) {
                
                while ($row = $result->fetch_assoc()){
                    echo '<div class="alternativa">
				<span>'.$Letra[$l].'</span>'.$row['descricao'].'</div>';
                    if($row['correta'] == 1){
                        $gabarito[$n] = $Letra[$l];
                    }
                }
            } 
             $l++;
            $z++;
        }
        echo '</div>';
        $j++;
        $n++;
    }
        $j=0;
        
    $i++;
}
echo '</div>';
return $gabarito;
}

function Gerar_Gabarito($gabarito){
    $tam = count($gabarito);
    
    $resp = array(
        "A" =>"<h1>&#9679;</h1> <h1>&#9675;</h1> <h1>&#9675;</h1><h1>&#9675;</h1><h1>&#9675;</h1></span>",
        "B" =>"<h1>&#9675;</h1> <h1>&#9679;</h1> <h1>&#9675;</h1><h1>&#9675;</h1><h1>&#9675;</h1></span>",
        "C" =>"<h1>&#9675;</h1> <h1>&#9675;</h1> <h1>&#9679;</h1><h1>&#9675;</h1><h1>&#9675;</h1></span>",
        "D" =>"<h1>&#9675;</h1> <h1>&#9675;</h1> <h1>&#9675;</h1><h1>&#9679;</h1><h1>&#9675;</h1></span>",
        "E" =>"<h1>&#9675;</h1> <h1>&#9675;</h1> <h1>&#9675;</h1><h1>&#9675;</h1><h1>&#9679;</h1></span>",
);
    echo '<div class="gabarito"><h1>GABARITO</h1>';
    for($i=1; $i<= $tam; $i++){
        echo '<span><p>Questão '.$i.' </p>'.$resp[$gabarito[$i]];       
    }
    echo '</div>';    
}