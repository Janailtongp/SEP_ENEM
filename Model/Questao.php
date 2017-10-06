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

function listarQuestaoProva() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select left(enunciado, 200)KK, disciplina, idQuestao, enunciado from questao");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td><input type='checkbox' name='Quest[]' value='".$row['idQuestao']."'></td>";
            echo"<td>" . $row['KK'] . "</td>";
            echo"<td>" . $row['disciplina'] . "</td>";
            echo"<td>
                    <button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal".$row['idQuestao']."'>
                    <span class='glyphicon glyphicon-eye-open'></span>
                    </button>

                    <div class='modal fade' id='myModal".$row['idQuestao']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                    <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                    <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'>Enunciado Completo</h4>
                    </div>
                    <div class='modal-body'>"
                        .$row['enunciado'].
                    "</div>
                    <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>
                    </div>
                    </div>
                    </div>
                    </div>

            </td></tr>";
                    }
    }
    $conn->close();
}
