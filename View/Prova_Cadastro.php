<?php
$titulo1 = 'Cadastro de prova';
$titulo2 = 'Cadastro de prova';
require_once './Topo.phtml';
?>

<form method="post" action="">
    <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <div class="input-group">
            <span class="input-group-addon">Título</span>
        </div>
        <input type="text" class="form-control" placeholder="Título" name="titulo"/><br/>


         <div class="input-group">
            <span class="input-group-addon">Assunto</span>
        </div>
        <input type="text" class="form-control" placeholder="Assunto" name="assunto"/><br/>
        
        
        <div class="input-group">
            <span class="input-group-addon">Simulado de destino</span>
        </div>
        <select name="nivel" class="form-control">
            <option value="1" selected="selected">IMPLEMENTAR</option>
            <option value="2">IMPLEMENTAR</option>
        </select><br/>
        

        <input type="submit" class="btn btn-success" name="cadastrar" value="Cadastrar">
    </div>
    
    
</form>


<?php require_once './Rodape.html'; ?>