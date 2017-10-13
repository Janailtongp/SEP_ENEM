<?php

function CadastrarSimulado($titulo, $desc, $data){
 $conn = F_conect();
    $sql = "INSERT INTO simulado(titulo, data_, descricao)
            VALUES('" . $titulo . "','" . $data . "','" . $desc . "')";
    if ($conn->query($sql) == TRUE) {
         Alert("Oba!", "Simulado cadastrado com sucesso <br/> <a href='Menu.php'> Voltar ao menu</a>", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();    
    
}

function listarSimulados() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from simulado");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['titulo'] . "</td>";
            echo"<td>" . $row['data_'] . "</td>";
            echo"<td>" . $row['descricao'] . "</td>";
            echo"<td><a href=Simulado_editar.php?id=" . $row['idSimulado'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=Simulado_excluir.php?id=" . $row['idSimulado'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}

function excluirSimulado($id) {

    $conn = F_conect();

    $sql = "DELETE FROM simulado WHERE idSimulado = ".$id;

    $conn->query($sql);

    $conn->close();
    
}

function editarSimulado($titulo, $data, $descricao,$id) {
    $conn = F_conect();
    $sql = " UPDATE simulado SET  titulo='" . $titulo . "', data_='" . $data . " ', descricao='" .
            $descricao . "' WHERE idSimulado = " . $id;

    if ($conn->query($sql) === TRUE) {
        Alert("Oba!", "Simulado atualizados com sucesso", "success");
        echo "<a href='Simulado_listar.php'> Voltar a lista de simulados</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}