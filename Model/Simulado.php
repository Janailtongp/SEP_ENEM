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
    $result = mysqli_query($conn, "Select * from simulado order by data_ desc");
   
    $i = 0;
    $simulados = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {
            $simulados[$i]['TITULO'] = $row['titulo'];
            $simulados[$i]['DATA'] = $row['data_'];
            $simulados[$i]['DESC'] = $row['descricao'];
            $simulados[$i]['ID'] = $row['idSimulado'];
            $i++;
        }
    }
    $conn->close();
    return $simulados;
}

function recuprarSimulados($id) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from simulado where idSimulado=".$id);
   
    $i = 0;
    $simulados = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {
            $simulados[$i]['TITULO'] = $row['titulo'];
            $simulados[$i]['DATA'] = $row['data_'];
            $simulados[$i]['DESC'] = $row['descricao'];
            $i++;
        }
    }
    $conn->close();
    return $simulados;
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
        Alert("Oba!", "Simulado atualizado com sucesso", "success");
        echo "<a href='Simulado_listar.php'> Voltar a lista de simulados</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function listarProvas_simulado($idSimulado){
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from prova WHERE Simulado_idSimulado =" . $idSimulado);
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