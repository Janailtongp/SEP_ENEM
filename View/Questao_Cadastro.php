<?php
$titulo1 = 'Cadastro de questão';
$titulo2 = 'Cadastro de questão';
require_once './Topo.phtml';
?>

<form method="post" action="">
    <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <div class="input-group">
            <span class="input-group-addon">Enunciado</span>
        </div>
        <input type="text" class="form-control" placeholder="Enunciado" name="enunciado"/><br/>


        <div class="input-group">
            <span class="input-group-addon">Alternativa A</span>
        </div>
        <input type="text" class="form-control" placeholder="Alternativa A" name="alt_A"/><br/>


        <div class="input-group">
            <span class="input-group-addon">Alternativa B</span>
        </div>
        <input type="text" class="form-control" placeholder="Alternativa B" name="alt_B"/><br/>


        <div class="input-group">
            <span class="input-group-addon">Alternativa C</span>
        </div>
        <input type="text" class="form-control" placeholder="Alternativa C" name="alt_C"/><br/>


        <div class="input-group">
            <span class="input-group-addon">Alternativa D</span>
        </div>
        <input type="text" class="form-control" placeholder="Alternativa D" name="alt_D"/><br/>


        <div class="input-group">
            <span class="input-group-addon">Alternativa E</span>
        </div>
        <input type="text" class="form-control" placeholder="Alternativa E" name="alt_E"/><br/>


        <div class="input-group">
            <span class="input-group-addon">Disciplina</span>
        </div>
        <input type="text" class="form-control" placeholder="Disciplina" name="disciplina"/><br/>


        <div class="input-group">
            <span class="input-group-addon">Nível</span>
        </div>
        <select name="nivel" class="form-control">
            <option value="facil" selected="selected">Fácil</option>
            <option value="medio">Médio</option>
            <option value="dificil">Difícil</option>
        </select>
        
        <br/>

        <div class="input-group">
            <span class="input-group-addon">Imagem</span>
        </div>
        <div class="form-group">
            <input type="file" id="imagem">
        </div>
        
        <input type="submit" class="btn btn-success" name="cadastrar" value="Cadastrar">
    </div>
    
    
</form>
   
<?php require_once './Rodape.html'; ?>
