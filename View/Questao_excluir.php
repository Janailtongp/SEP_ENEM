<?php
           
        //CONECTAR          
        require_once '../Model/connect.php';            
        require_once '../Controller/QuestaoController.php';
        require_once '../Controller/ConnectController.php';
        $objConnecta = new ConnectController();
        
        //$objConnecta->verificarlogin();
        
if ((isset($_GET['id']))) {
        require_once '../Controller/QuestaoController.php';
        $idQuest = (int) $_GET['id'];

        
        $objControl = new QuestaoController();
        $objControl->ExcluirQuestao($idQuest);
    }else{
        
        header("Location: Questao_listar.php");
        
    }

?>