<?php

function cadastrarQuestao($enunciado,$disciplina,$assunto){
    $conn = F_conect();
    $sql = "INSERT INTO questao(enunciado, disciplina, assunto) VALUES('" . $enunciado . "','" . $disciplina . "','" . $assunto . "')";
    if ($conn->query($sql) == TRUE) {
        //  Alert("Oba!", "Questão cadastrada com sucesso <br/> <a href='Questao_listar.php'> Voltar ao menu</a>", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $last = $conn->insert_id;
    $conn->close();
    return $last;
}

function cadastrarAlternativa($idQuestao, $alternativas, $correta){
    $conn = F_conect();
    $cont = 0;
    $resp = 0;
    for ($i = 0; $i < 5; $i++) {
        if ($correta == $i) {
            $resp = 1;
        }
        $sql = "INSERT INTO alternativa(Questao_idQuestao, descricao, correta) VALUES('" . $idQuestao . "','" . $alternativas[$i] . "'," . $resp . ")";
        if ($conn->query($sql) == TRUE) {
            $cont ++;
        }
        $resp = 0;
    }
    if ($cont = 5) {
        Alert("Oba!", "5 Alternativas cadastradas!!! <br/> <a href='Questao_listar.php'> Voltar ao menu</a>", "success");
    }
}

function resgatarQuestao($id) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select enunciado from questao where idQuestao=" . $id);
    $vetor = array();
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            $vetor[0] = $row['enunciado'];
        }
    }

    $result2 = mysqli_query($conn, "Select descricao from alternativa where Questao_idQuestao=" . $id);
    $i = 1;
    if (mysqli_num_rows($result2)) {
        while ($row1 = $result2->fetch_assoc()) {
            $vetor[$i] = $row1['descricao'];
            $i++;
        }
    }
    $conn->close();
    return $vetor;
}

function editarQuestao($enunciado, $disciplina, $assunto, $idQuestao) {
    $conn = F_conect();
    $sql = "UPDATE questao SET enunciado = '" . $enunciado . "', disciplina ='".$disciplina."', assunto='".$assunto."'  WHERE idQuestao =" . $idQuestao;
    $bool = false;
    if ($conn->query($sql) == TRUE) {
        $bool = true;
     } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    return $bool;
}

function editarAlternativa($idQuestao, $alternativas, $correta) {
    $conn = F_conect();
    $cont = 0;
    $resp = 0;
    $del = "DELETE FROM alternativa WHERE Questao_idQuestao = " . $idQuestao;
    if($conn->query($del)){
        for ($i = 0; $i < 5; $i++) {
            if ($correta == $i) {
                $resp = 1;
            }
            $sql = "INSERT INTO alternativa(Questao_idQuestao, descricao, correta) VALUES('" . $idQuestao . "','" . $alternativas[$i] . "'," . $resp . ")";
            if ($conn->query($sql) == TRUE) {
                $cont ++;
            }
            $resp = 0;
        }
        if ($cont = 5) {
            Alert("Oba!", "Questão alterada com sucesso!!! <br/> <a href='Questao_listar.php'> Voltar ao menu</a>", "success");
        }
    }
}

function excluirQuestao($id) {

    $conn = F_conect();

    $sql = "DELETE FROM questao WHERE idQuestao = " . $id;

    if($conn->query($sql)){
        $sql2 = "DELETE FROM alternativa WHERE Questao_idQuestao=" . $id;
        $conn->query($sql2);
    }
    $conn->close();
}

function listarQuestao() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select left(enunciado, 200)KK, disciplina, idQuestao, assunto, enunciado from questao");
    $vetor = array();
    $i=0;
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            $vetor[$i]['idQuestao'] = $row['idQuestao'];
            $vetor[$i]['preview'] = $row['KK'];
            $vetor[$i]['disciplina'] = NomeArea($row['disciplina']);
                $result2 =  mysqli_query($conn, "Select titulo from assunto where IdAssunto =".$row['assunto']);
                $row2 = $result2->fetch_assoc();
            $vetor[$i]['assunto'] = $row2['titulo'];
            $vetor[$i]['enunciado'] = $row['enunciado'];
            $i++;
        }
    }
    $conn->close();
    return $vetor;
}

// Questões vinculadas a uma devida prova
function existe_Quest_prova($id){
     $conn = F_conect();
     $result = mysqli_query($conn,'SELECT * FROM questao_prova');
     while($row = mysqli_fetch_assoc($result)){
              if($row['Questao_idQuestao'] == $id){    
                  $conn->close();
                  return 1;
              }
     }
    $conn->close();
    return 0;
}

function listarQuestao_area($idArea) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select left(enunciado, 200)KK, disciplina, idQuestao, assunto, enunciado from questao WHERE disciplina=".$idArea);
    $vetor = array();
    $i=0;
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            $vetor[$i]['idQuestao'] = $row['idQuestao'];
            $vetor[$i]['preview'] = $row['KK'];
            $vetor[$i]['disciplina'] = NomeArea($row['disciplina']);
                $result2 =  mysqli_query($conn, "Select titulo from assunto where IdAssunto =".$row['assunto']);
                $row2 = $result2->fetch_assoc();
            $vetor[$i]['assunto'] = $row2['titulo'];
            $vetor[$i]['enunciado'] = $row['enunciado'];
            $i++;
        }
    }
    $conn->close();
    return $vetor;
}

function listarQuestao_prova($idprova) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select left(q.enunciado, 200)KK, q.disciplina, q.idQuestao, q.assunto, q.enunciado from questao q, questao_prova qp WHERE q.idQuestao = qp.Questao_idQuestao AND qp.Prova_idProva =".$idprova);
    $vetor = array();
    $i=0;
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            $vetor[$i]['idQuestao'] = $row['idQuestao'];
            $vetor[$i]['preview'] = $row['KK'];
            $vetor[$i]['disciplina'] = NomeArea($row['disciplina']);
                $result2 =  mysqli_query($conn, "Select titulo from assunto where IdAssunto =".$row['assunto']);
                $row2 = $result2->fetch_assoc();
            $vetor[$i]['assunto'] = $row2['titulo'];
            $vetor[$i]['enunciado'] = $row['enunciado'];
            $i++;
        }
    }
    $conn->close();
    return $vetor;
}

function Cadastrar_Quest_Prova($idProva, $idQuest){
    $conn = F_conect();
    $sucess = 0 ;
    $rep = 0;
    for ($i = 0; $i < count($idQuest); $i++) {
        if(!existe_Quest_prova($idQuest[$i])){
           $sql = "INSERT INTO questao_prova(Questao_idQuestao, Prova_idProva)
            VALUES(".$idQuest[$i].",".$idProva.")";
            if($conn->query($sql) == TRUE){
               $sucess++;
            } 
        }else{
            $rep++;
        }
    }
    $conn->close();  
    if($sucess > 0){
    Alert("Oba!", "[".$sucess."] questão(ões) adicionadas com sucesso<br/> <a href='Questoes_PorProva.php?id=".$idProva."'> Lista de questões para essa prova</a>", "success");
    }
    if($rep > 0){
        Alert("Ops!", "[".$rep."] questão(ões) repetidas não foram adicionadas<br/> <a href='Questoes_PorProva.php?id=".$idProva."'> Lista de questões para essa prova</a>", "danger");
    
    }
}

function excluirQuestao_prova($idprova, $idQuest){
    $conn = F_conect();
    $sql = "DELETE FROM questao_prova WHERE (Questao_idQuestao =".$idQuest." AND Prova_idProva=".$idprova.")";
    $conn->query($sql);
    $conn->close();
}

