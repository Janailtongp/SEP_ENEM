<?php

function CadastrarAssunto($titulo, $area){
 $conn = F_conect();
    $sql = "INSERT INTO assunto(titulo, disciplina)
            VALUES('" . $titulo . "','" . $area . "')";
    if ($conn->query($sql) == TRUE) {
         Alert("Oba!", "Assunto cadastrado com sucesso <br/> <a href='Menu.php'> Voltar ao menu</a>", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();    
    
}

function listarAssuntos(){
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from assunto");
   
    $i = 0;
    $assuntos = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {
            $assuntos[$i]['TITULO'] = $row['titulo'];
            $assuntos[$i]['AREA'] = $row['disciplina'];
            $assuntos[$i]['ID'] = $row['IdAssunto'];
            $i++;
        }
    }
    $conn->close();
    return $assuntos;
}

function recuprarAssunto($id) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from assunto where idAssunto=".$id);
   
    $i = 0;
    $assuntos = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {
            $assuntos[$i]['TITULO'] = $row['titulo'];
            $assuntos[$i]['AREA'] = $row['disciplina'];
            $i++;
        }
    }
    $conn->close();
    return $assuntos;
}
function recuprarAssuntos_Area($idArea) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from assunto where disciplina=".$idArea);
   
    $i = 0;
    $assuntos = array();
    if (mysqli_num_rows($result)!=0) {
        while ($row = $result->fetch_assoc()) {
            $assuntos[$i]['TITULO'] = $row['titulo'];
            $assuntos[$i]['ID_ASSUNTO'] = $row['idAssunto'];
            $i++;
        }
    }
    $conn->close();
    return $assuntos;
}

function excluirSimulado($id) {

    $conn = F_conect();

    $sql = "DELETE FROM assunto WHERE idAssunto = ".$id;

    $conn->query($sql);

    $conn->close();
    
}

function editarAssunto($titulo, $area, $id) {
    $conn = F_conect();
    $sql = " UPDATE assunto SET  titulo='" . $titulo . "', disciplina='" . $area . "' WHERE idAssunto = " . $id;

    if ($conn->query($sql) === TRUE) {
        Alert("Oba!", "Assunto atualizado com sucesso", "success");
        echo "<a href='Assunto_listar.php'> Voltar a lista de assuntos</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}