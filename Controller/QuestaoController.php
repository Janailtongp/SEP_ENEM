<?php
     require_once '../Model/Questao.php';
class QuestaoController{
    public function CadastrarQuestao($enunciado, $a, $b, $c, $d, $e) {
        cadastrarQuestao($enunciado, $a, $b, $c, $d, $e);
        
    }
    
     public function EditarQuestao($enunciado, $a, $b, $c, $d, $e, $id) {
        editarQuestao($enunciado, $a, $b, $c, $d, $e, $id);
        
    }
    
     public function ExcluirQuestao($id) {
         excluirQuestao($id);
        header( "Location: Questao_listar.php");
    }
    
    public function ListarQestoesProva() {
        listarQuestaoProva();
    }
    
}