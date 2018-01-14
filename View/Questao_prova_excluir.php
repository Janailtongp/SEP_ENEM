<?php
           
        //CONECTAR          
        require_once '../Model/connect.php';            
        require_once '../Controller/QuestaoController.php';
        require_once '../Controller/ConnectController.php';
        $objConnecta = new ConnectController();
        
        //$objConnecta->verificarlogin();
        
if ((isset($_GET['idquest'])) AND (isset($_GET['idprova']))){
        require_once '../Controller/QuestaoController.php';
        $idQuest = (int) $_GET['idquest'];
        $idprova = (int) $_GET['idprova'];

        
        $objControl = new QuestaoController();
        $objControl->ExcluirQuestao_prova($idprova, $idQuest);
    }else{
        
        header( "Location: Questoes_PorProva.php?id=".$idprova);
        
    }

?>