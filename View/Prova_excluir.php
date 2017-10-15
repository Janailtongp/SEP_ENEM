<?php
           
        //CONECTAR          
        require_once '../Model/connect.php'; 
        
if ((isset($_GET['id']))) {
        require_once '../Controller/ProvaController.php';
        $idProva = (int) $_GET['id'];
        $objControl = new ProvaController();
        $objControl->ExcluirProva($idProva);
    }else{
        
        header("Location: Prova_listar.php");
        
    }

?>