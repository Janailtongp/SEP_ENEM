<?php
$titulo1 = 'Editar questão';
$titulo2 = 'Editar questão';
require_once './Topo.phtml';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    require_once '../Controller/QuestaoController.php';
    $objControl = new QuestaoController();
    $vetor = $objControl->BuscarQuestao($id);
} else {
    echo "<script language= 'JavaScript'>
                                            location.href='erro.php'
                                    </script>";
}
if (isset($_POST["cadastrar"])) {
    $objControl = new QuestaoController();
    $objControl->editarQuestao($_POST["enunciado"], $_POST["altA"], $_POST["altB"], $_POST["altC"], $_POST["altD"], $_POST["altE"],$_POST["correta"], $id);
}
?> 
<br />
<br />
<form action="" method="post">
    <div class="input-group">
        <span class="input-group-addon">Enuncuado</span>
    </div> 
    <textarea class="ckeditor" name="enunciado" required="required"><?php echo $vetor[0]; ?></textarea><br/>


    <div class="input-group">
        <span class="input-group-addon">Alternativa A</span>
    </div> 
    <textarea class="ckeditor" name="altA" required="required"><?php echo $vetor[1]; ?></textarea><br/>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-default">
            <input type="radio" name="correta" value="0" checked  > Correta</label>

        <br/>
        <br/>

        <div class="input-group">
            <span class="input-group-addon">Alternativa B</span>
        </div> 
        <textarea class="ckeditor" name="altB" required="required"><?php echo $vetor[2]; ?></textarea><br/>
        <label class="btn btn-default"><input type="radio" name="correta" value="1" > Correta</label>
        <br/>
        <br/>

        <div class="input-group">
            <span class="input-group-addon">Alternativa C</span>
        </div> 
        <textarea class="ckeditor" name="altC" required="required"><?php echo $vetor[3]; ?></textarea><br/>
        <label class="btn btn-default"><input type="radio" name="correta" value="1" > Correta</label>
        <br/>
        <br/>

        <div class="input-group">
            <span class="input-group-addon">Alternativa D</span>
        </div> 
        <textarea class="ckeditor" name="altD" required="required"><?php echo $vetor[4]; ?></textarea><br/>
        <label class="btn btn-default"><input type="radio" name="correta" value="1" > Correta</label>
        <br/>
        <br/>

        <div class="input-group">
            <span class="input-group-addon">Alternativa E</span>
        </div> 
        <textarea class="ckeditor" name="altE" required="required"><?php echo $vetor[5]; ?></textarea><br/>
        <label class="btn btn-default"><input type="radio" name="correta" value="1" > Correta</label>
        <br/>
        <br/>
    </div>
    <input type="submit" class="btn btn-success" name="cadastrar" value="Atualizar"> 
</form>    

<?php require_once './Rodape.html'; ?>
