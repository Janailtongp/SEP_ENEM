<?php
$titulo1 = 'Prova - Adicionar Questões';
$titulo2 = 'Prova - Adicionar Questões';
require_once './Topo.phtml';
require '../Controller/QuestaoController.php';
$obj = new QuestaoController();
$vetor = $obj->ListarQestoes();
$tamanho = count($vetor);


?>

<div class="col-md-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10">
    <form action="teste.php" method="post">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Enunciado</th>
                    <th>Disciplina</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

       <?php for ($i = 0; $i < $tamanho; $i++) { ?>
                    <tr>
                        <td><input type='checkbox' name='Quest[]' value='<?php echo $vetor[$i]['idQuestao']; ?>'></td>
                        <td><?php echo $vetor[$i]['preview']; ?></td>
                        <td><?php echo $vetor[$i]['disciplina']; ?></td>
                        <td>
                            <button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal<?php echo $vetor[$i]['idQuestao']; ?>'>
                                <span class='glyphicon glyphicon-eye-open'></span>
                            </button>
                            <div class='modal fade' id=myModal<?php echo $vetor[$i]['idQuestao'];?> tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                            <h4 class='modal-title' id='myModalLabel'>Enunciado Completo</h4>
                                        </div>
                                        <div class='modal-body'><?php echo $vetor[$i]['enunciado'] ?></div>
                                        <div class='modal-footer'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php
                 }
                ?>
            </tbody>
        </table>
        <input type="submit" class="btn btn-success" name="cadastrar" value="Adicionar a Prova"> 
    </form>
</div>

<?php require_once './Rodape.html'; ?>