<?php
     require_once '../Model/Simulado.php';
Class SimuladoController{
    
    public function CadastrarSimulado($titulo, $desc, $data) {
        cadastrarSimulado($titulo, $desc, $data);
    }
    
    public function ListarSimulados() {
        listarSimulados();
    }
    
    public function ExcluirSimulado($id) {
        excluirSimulado($id);
        header( "Location: Simulado_listar.php");
    }
    
    public function EditarSimulado($titulo, $data, $descricao,$id) {
            editarSimulado($titulo, $data, $descricao, $id);
        
    }
    
}    
