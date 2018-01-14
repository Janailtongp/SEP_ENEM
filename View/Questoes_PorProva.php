<?php
$titulo1 = 'Listar Questões';
$titulo2 = 'Listar Questões - Prova';
require_once './Topo.phtml';
?>

<div class="col-md-offset-0 col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <form action="teste.php" method="post">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="col-lg-6">Resumo</th>
                    <th></th>
                    <th class="col-lg-3">Área</th>
                    <th class="col-lg-3">Assunto</th>
                    <th ></th>
                </tr>
            </thead>
            <tbody>
            <?php
     if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        require '../Controller/QuestaoController.php';
        $obj = new QuestaoController();
        $vetor = $obj->ListarQestoes_Prova($id);
     } else {
        echo "<script language= 'JavaScript'>
                                                location.href='erro.php'
                                        </script>";
    }
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
                        <td><?php echo $vetor[$i]['assunto']; ?></td>
                        <td><a onclick='return confirmar();' href="Questao_prova_excluir.php?idquest=<?php echo $vetor[$i]['idQuestao']; ?>&idprova=<?php echo $_GET['id'];?>"><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>
                    
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
        <input type="button" value="Voltar" onClick="JavaScript: window.history.back();">
    </form>
</div>
<?php require_once './Rodape.html'; ?>