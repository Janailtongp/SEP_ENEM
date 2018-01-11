<?php
$titulo1 = 'Listar Questões';
$titulo2 = 'Listar Questões';
require_once './Topo.phtml';
?>

<div class="col-md-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10">
    <form action="teste.php" method="post">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Resumo</th>
                    <th></th>
                    <th>Área</th>
                    <th>Assunto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                require '../Controller/QuestaoController.php';
                $obj = new QuestaoController();
                $vetor = $obj->ListarQestoes();
                ?>
            </tbody>
             <?php
            $tamanho = count($vetor);
            if($tamanho > 0){
                for($i =0; $i<$tamanho; $i++){
                    ?>
                    <tr><td><?php echo $vetor[$i]['preview'];?> [...]</td>
                        <td> 
                            <button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal<?php echo $vetor[$i]['idQuestao']; ?>'>
                                <span class='glyphicon glyphicon-eye-open'></span>
                            </button>
                        </td>
                        <td><?php echo $vetor[$i]['disciplina']; ?></td>
                        <td><?php echo $vetor[$i]['disciplina']; ?></td>
                        <td><a href="Questao_editar.php?id=<?php echo $vetor[$i]['idQuestao']; ?>"><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                            <a onclick='return confirmar();' href="Questao_excluir.php?id=<?php echo $vetor[$i]['idQuestao']; ?>"><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>
                    
                            <!--Enunciado completo-->
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
                <?php
                    }
            }    
            ?>
        </table>
    </form>
</div>
<?php require_once './Rodape.html'; ?>