<?php
           
        //CONECTAR          
        require_once '../Model/connect.php';            
        require_once '../Controller/SimuladoController.php';
        require_once '../Controller/ConnectController.php';
        $objConnecta = new ConnectController();
        
        //$objConnecta->verificarlogin();
        
if ((isset($_GET['id']))) {
        require_once '../Controller/SimuladoController.php';
        $idSimulado = (int) $_GET['id'];

        
        $objControl = new SimuladoController();
        $objControl->ExcluirSimulado($idSimulado);
    }else{
        
        header("Location: Menu.php");
        
    }

?>