<?php

function CadastrarProva($titulo, $asaunto, $Simulado_idSimulado,$usuario_idAdmin){
 $conn = F_conect();
    $sql = "INSERT INTO prova(titulo, asaunto, Simulado_idSimulado, usuario_idAdmin)
            VALUES('" . $titulo . "','" . $asaunto . "','" . $Simulado_idSimulado . "','" . $usuario_idAdmin . "')";
    if ($conn->query($sql) == TRUE) {
         Alert("Oba!", "Prova cadastrada com sucesso <br/> <a href='Menu.php'> Voltar ao menu</a>", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();    
    
}

function listarProvaa() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from prova");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['titulo'] . "</td>";
            echo"<td>" . $row['asaunto'] . "</td>";
            echo"<td>" . $row['Simulado_idSimulado'] . "</td>";
            echo"<td><a href=Prova_editar.php?id=" . $row['idProva'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=Prova_excluir.php?id=" . $row['idProva'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}

function excluirProva($id) {

    $conn = F_conect();

    $sql = "DELETE FROM prova WHERE idProva = ".$id;

    $conn->query($sql);

    $conn->close();
    
}

function editarProva($titulo, $asaunto, $Simulado_idSimulado,$id) {
    $conn = F_conect();
    $sql = " UPDATE prova SET  titulo='" . $titulo . "', assunto='" . $asaunto . "',"
            . "Simulado_idSimulado='" . $Simulado_idSimulado . "' WHERE idProva = " . $id;

    if ($conn->query($sql) === TRUE) {
        Alert("Oba!", "Prova atualizados com sucesso", "success");
        echo "<a href='Prova_listar.php'> Voltar a lista de Provas</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}