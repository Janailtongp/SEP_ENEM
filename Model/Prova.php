<?php

function CadastrarProva($titulo, $asaunto, $Simulado_idSimulado, $usuario_idAdmin) {
    $conn = F_conect();
    $sql = "INSERT INTO prova(titulo, assunto, Simulado_idSimulado, usuario_idAdmin)
            VALUES('" . $titulo . "','" . $asaunto . "','" . $Simulado_idSimulado . "','" . $usuario_idAdmin . "')";
    if ($conn->query($sql) == TRUE) {
        Alert("Oba!", "Prova cadastrada com sucesso <br/> <a href='Menu.php'> Voltar ao menu</a>", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function listarProvas($IDUsuario) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from prova  order by Simulado_idSimulado desc");
    $i = 0;
    $provas = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {
            $provas[$i]['TITULO'] = $row['titulo'];
            $provas[$i]['ASSUNTO'] = NomeArea($row['assunto']);
            $result2 = mysqli_query($conn, "Select titulo from simulado WHERE idSimulado =" . $row['Simulado_idSimulado']);
            $titulo_simulado = $result2->fetch_assoc();
            $provas[$i]['ID_SIMULADO'] = $titulo_simulado['titulo'];
            $provas[$i]['ID_PROVA'] = $row['idProva'];
            $i++;
        }
    }
    $conn->close();
    return $provas;
    
}

function excluirProva($id){

    $conn = F_conect();

    $sql = "DELETE FROM prova WHERE idProva = " . $id;

    $conn->query($sql);

    $conn->close();
}

function ProvaEditavel($idAdmin, $idProva) {
    $idAdmin = null; // Caso queira filtrar por Usuário
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from prova where idProva=" . $idProva);
    $i = 0;
    $prova = array();
    while ($row = $result->fetch_assoc()) {
        $prova[$i]['TITULO'] = $row['titulo'];
        $prova[$i]['ASSUNTO'] = $row['assunto'];
        $prova[$i]['ID_PROVA'] = $row['idProva'];
    }
    $conn->close();
    return $prova;
}

function editarProva($titulo, $assunto, $Simulado_idSimulado, $id) {
    $conn = F_conect();
    $sql = " UPDATE prova SET  titulo='" . $titulo . "', assunto='" . $assunto . "',"
            . "Simulado_idSimulado='" . $Simulado_idSimulado . "' WHERE idProva = " . $id;

    if ($conn->query($sql) === TRUE) {
        Alert("Oba!", "Prova atualizados com sucesso", "success");
        echo "<a href='Prova_listar.php'> Voltar a lista de Provas</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function SimuladosExistentes() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from simulado");
    $i = 0;
    $simulados = array();
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            $simulados[$i]['ID'] = $row['idSimulado'];
            $simulados[$i]['TITULO'] = $row['titulo'];
            $i++;
        }
    }
    return $simulados;
}
