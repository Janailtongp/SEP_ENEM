<?php
     require_once '../Model/Questao.php';
class QuestaoController{
    public function CadastrarQuestao($enunciado, $a, $b, $c, $d, $e) {
        cadastrarQuestao($enunciado, $a, $b, $c, $d, $e);
        
    }
    
    
}