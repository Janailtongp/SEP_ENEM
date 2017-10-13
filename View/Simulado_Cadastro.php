<?php
$titulo1 = 'Cadastro de simulado';
$titulo2 = 'Cadastro de simulado';
require_once './Topo.phtml';
?>

<?php 
           require_once '../Controller/SimuladoController.php';
        if(isset($_POST['cadastrar'])){
            $objSimulado = new SimuladoController();
            $objSimulado->CadastrarSimulado($_POST['titulo'], $_POST['descricao'], $_POST['data']);
            
        }
?>
<br/>
<form method="post" action="">
    <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <div class="input-group">
            <span class="input-group-addon">Título</span>
        </div>
        <input type="text" class="form-control" placeholder="Título" name="titulo"/><br/>


         <div class="input-group">
            <span class="input-group-addon">Descrição do simulado</span>
        </div>
        <input type="text" class="form-control" placeholder="Descrição" name="descricao"/><br/>
        
        <div class="input-group">
            <span class="input-group-addon">Data criação</span>
        </div>
        <input type="date" class="form-control" name="data"/><br/>

        <input type="submit" class="btn btn-success" name="cadastrar" value="Cadastrar">
    </div>
    
    
</form>

<?php require_once './Rodape.html'; ?>