<?php
$titulo1 = 'Cadastro de Assunto';
$titulo2 = 'Cadastro de Assunto';
require_once './Topo.phtml';
?>

<?php 
           require_once '../Controller/AssuntoController.php';
        if(isset($_POST['cadastrar'])){
            $objSimulado = new AssuntoController();
            $objSimulado->CadastrarAssunto($_POST['titulo'], $_POST['disciplina']);
            
        }
?>
<br/>
<form method="post" action="">
    <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <div class="input-group">
            <span class="input-group-addon">Título</span>
        </div>
        <input type="text" class="form-control" placeholder="Título" name="titulo" required=""/><br/>


         <div class="input-group">
                <span class="input-group-addon">Área</span>
            </div>
            <select name="disciplina" class="form-control" >
                <option value="1" selected="selected">Ciências da Natureza e suas Tecnologias</option>
                <option value="2">Ciências Humanas e suas Tecnologias</option>
                <option value="3">Linguagens, Códigos e suas Tecnologias</option>
                <option value="4">Matemática e suas Tecnologias</option>
            </select><br/>
       
         <input type="submit" class="btn btn-success" name="cadastrar" value="Cadastrar">
    </div>
    
    
</form>

<?php require_once './Rodape.html'; ?>