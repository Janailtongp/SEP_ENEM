<?php
$titulo1 = 'Cadastro de usuário';
$titulo2 = 'Cadastro de usuário';
require_once './Topo.phtml';
?>

<form method="post" action="">
    <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <div class="input-group">
            <span class="input-group-addon">Nome</span>
        </div>
        <input type="text" class="form-control" placeholder="Nome" name="nome"/><br/>


        <div class="input-group">
            <span class="input-group-addon">E-mail</span>
        </div>
        <input type="text" class="form-control" placeholder="E-mail" name="email"/><br/>

        
        <div class="input-group">
            <span class="input-group-addon">Nível de usuário</span>
        </div>
        <select name="nivel" class="form-control">
            <option value="1" selected="selected">Professor</option>
            <option value="2">Cordenador</option>
        </select><br/>

        <div class="input-group">
            <span class="input-group-addon">Senha</span>
        </div>
        <input type="password" class="form-control" placeholder="Senha" name="senha"/><br/>


        <div class="input-group">
            <span class="input-group-addon">Confirmar senha</span>
        </div>
        <input type="password" class="form-control" placeholder="Confirmar senha" name="C_senha"/><br/>
       
        <input type="submit" class="btn btn-success" name="cadastrar" value="Cadastrar">
    </div>
    
    
</form>


<?php require_once './Rodape.html'; ?>