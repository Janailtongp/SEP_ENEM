<?php
     require_once '../Model/Prova.php';
Class ProvaController{
    
    public function SimuladosExistentes() {
         return SimuladosExistentes();
    }
    
    public function CadastrarProva($titulo, $asaunto, $Simulado_idSimulado,$usuario_idAdmin) {
        CadastrarProva($titulo, $asaunto, $Simulado_idSimulado,$usuario_idAdmin);
    }
    
    public function ListarProvas($IDusuario){
        return listarProvas($IDusuario);
    }
    
    public function ProvaEditavel($IDadmin, $IDprova) {
        return ProvaEditavel($IDadmin, $IDprova);
    }
    
    public function EditarProva($titulo, $assunto, $id_simulado, $ID_PROVA){
        editarProva($titulo, $assunto, $id_simulado, $ID_PROVA);
        
    }
    public function ExcluirProva($idProva){
        excluirProva($idProva);
        header("Location: Prova_listar.php");
    }
    
}    
