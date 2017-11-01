<?php
function cadastrar($nome, $email, $nivel, $senha) {
    $conn = F_conect();
    $sql = "INSERT INTO usuario(nome, email, nivel,senha)
            VALUES('" . $nome . "','" . $email . "','" . $nivel . "','" . $senha . "')";
    if ($conn->query($sql) == TRUE) {
        Alert("Oba!", "Usuário cadastrado com sucesso <br/> <a href='Usuario_listar.php'> Voltar ao menu</a>", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function listar() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from usuario WHERE nivel = 1");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['nome'] . "</td>";
            echo"<td>" . $row['email'] . "</td>";
            echo"<td><a href=Usuario_editar.php?id=" . $row['idAdmin'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=Usuario_excluir.php?id=" . $row['idAdmin'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}
function editarProfessor($nome, $email, $nivel, $senha, $id) {
    $conn = F_conect();
    $sql = " UPDATE usuario SET  nome='" . $nome . "', email='" . $email . " ', nivel='" .
            $nivel . "', senha='" . $senha . " ' WHERE idusuario = " . $id;

    if ($conn->query($sql) === TRUE) {
        Alert("Oba!", "Dados atualizados com sucesso", "success");
        echo "<a href='Usuario_listar.php'> Voltar a lista professores</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluir($id) {

    $conn = F_conect();

    $sql = "DELETE FROM usuario WHERE idAdmin = ".$id." AND nivel = 1";

    $conn->query($sql);

    $conn->close();
    
}
