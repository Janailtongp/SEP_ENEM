<?php

function cadastrarQuestao($enunciado, $a, $b, $c, $d, $e) {
    $conn = F_conect();
    $sql = "INSERT INTO questao(enunciado, altA, altB, altC, altD, altE)
            VALUES('" . $enunciado . "','" . $a . "','" . $b . "','" . $c . "','" . $d . "','" . $e . "')";
    if ($conn->query($sql) == TRUE) {
        Alert("Oba!", "Questão cadastrada com sucesso <br/> <a href='Questao_listar.php'> Voltar ao menu</a>", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function editarQuestao($enunciado, $a, $b, $c, $d, $e, $idQuestao) {
    $conn = F_conect();
    $sql = "UPDATE questao SET enunciado = '".$enunciado."',altA = '".$a."',altB ='".$b."', altC ='".$c."', altD='".$d."', altE = '".$e."' WHERE idQuestao =".$idQuestao;
    if ($conn->query($sql) == TRUE) {
        Alert("Oba!", "Questão Atualizada com sucesso <br/> <a href='Questao_listar.php'> Voltar ao menu</a>", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function excluirQuestao($id) {

    $conn = F_conect();

    $sql = "DELETE FROM questao WHERE idQuestao = ".$id;

    $conn->query($sql);

    $conn->close();
    
}
