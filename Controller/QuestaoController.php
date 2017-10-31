<?php
     require_once '../Model/Questao.php';
class QuestaoController{
    public function CadastrarQuestao($enunciado, $a, $b, $c, $d, $e, $correta) {
        $alt[0] = $a;
        $alt[1] = $b;
        $alt[2] = $c;
        $alt[3] = $d;
        $alt[4] = $e;
        $id_quest = cadastrarQuestao($enunciado);
        cadastrarAlternativa($id_quest, $alt, $correta);
        
    }
    
    public function BuscarQuestao($id) {
        return resgatarQuestao($id);
        
    }
     public function EditarQuestao($enunciado, $a, $b, $c, $d, $e, $correta, $id) {
        $alt[0] = $a;
        $alt[1] = $b;
        $alt[2] = $c;
        $alt[3] = $d;
        $alt[4] = $e;
       if(editarQuestao($enunciado, $id)){
           editarAlternativa($id, $alt, $correta);
       }
    }
    
     public function ExcluirQuestao($id) {
         excluirQuestao($id);
        header( "Location: Questao_listar.php");
    }
    
    public function ListarQestoesProva() {
        listarQuestaoProva();
    }
    
}