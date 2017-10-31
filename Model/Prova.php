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
    $result = mysqli_query($conn, "Select * from prova WHERE usuario_idAdmin=" . $IDUsuario);
    $i = 0;
    $provas = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {
            $provas[$i]['TITULO'] = $row['titulo'];
            $provas[$i]['ASSUNTO'] = $row['assunto'];
            $provas[$i]['ID_SIMULADO'] = $row['Simulado_idSimulado'];
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

    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from prova where idProva=" . $idProva . " and usuario_idAdmin =" . $idAdmin);
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
