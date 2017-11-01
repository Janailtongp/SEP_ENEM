<?php

function cadastrarQuestao($enunciado){
    $conn = F_conect();
    $sql = "INSERT INTO questao(enunciado) VALUES('" . $enunciado . "')";
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

function editarQuestao($enunciado, $idQuestao) {
    $conn = F_conect();
    $sql = "UPDATE questao SET enunciado = '" . $enunciado . "' WHERE idQuestao =" . $idQuestao;
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
    $result = mysqli_query($conn, "Select left(enunciado, 200)KK, disciplina, idQuestao, enunciado from questao");
    $vetor = array();
    $i=0;
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            $vetor[$i]['idQuestao'] = $row['idQuestao'];
            $vetor[$i]['preview'] = $row['KK'];
            $vetor[$i]['disciplina'] = $row['disciplina'];
            $vetor[$i]['enunciado'] = $row['enunciado'];
            $i++;
        }
    }
    $conn->close();
    return $vetor;
}
