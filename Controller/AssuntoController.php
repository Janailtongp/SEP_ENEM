<?php
     require_once '../Model/Assunto.php';
Class AssuntoController{
    
    public function CadastrarAssunto($titulo, $area) {
        cadastrarAssunto($titulo, $area);
    }
    
    public function ListarAssuntos() {
        return listarAssuntos();
    }
    
     public function RecuperarAssunto($id) {
        return recuprarAssunto($id);
    }
    
    public function ExcluirAssunto($id) {
        excluirAssunto($id);
        header( "Location: Assunto_listar.php");
    }
    
    public function EditarAssunto($titulo, $area, $id) {
        editarAssunto($titulo, $area, $id);
        
    }
    
}    
