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
