<?php
$titulo1 = 'Cadastro de prova';
$titulo2 = 'Cadastro de prova';
require_once './Topo.phtml';
    include '../Controller/ProvaController.php';
    $objProva = new ProvaController();
    if(isset($_POST['cadastrar'])){
        
        $objProva->CadastrarProva($_POST['titulo'], $_POST['assunto'], $_POST['id_simulado'],  $_SESSION['idUSU']);
        
    }
?>

<form method="post" action="">
    <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <div class="input-group">
            <span class="input-group-addon">Título</span>
        </div>
        <input type="text" class="form-control" placeholder="Título" name="titulo" required=""/><br/>


         <div class="input-group">
            <span class="input-group-addon">Assunto</span>
        </div>
        <input type="text" class="form-control" placeholder="Assunto" name="assunto" required=""/><br/>
        
        
        <div class="input-group">
            <span class="input-group-addon">Simulado de destino</span>
        </div>
        <select name="id_simulado" id="id_categoria" class="form-control select2" required="">
        <?php
            
            $vetor = $objProva->SimuladosExistentes(); 
            $tamanho = count($vetor);
            for($i =0; $i<$tamanho;$i++){
            echo "<option value='".$vetor[$i]['ID']."'>".$vetor[$i]['TITULO']."</option>";

            }
            ?>
        </select>
        

        <input type="submit" class="btn btn-success" name="cadastrar" value="Cadastrar">
    </div>
    
    
</form>


<?php require_once './Rodape.html'; ?>