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
                    <th>Disciplina</th>
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
                    echo"<tr><td>" . $vetor[$i]['preview']  . "</td>";
                    echo"<td>" .     $vetor[$i]['disciplina'] . "</td>";
                    echo"<td><a href=Questao_editar.php?id=" . $vetor[$i]['idQuestao'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                                <a onclick='return confirmar();' href=Questao_excluir.php?id=" . $vetor[$i]['idQuestao'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
                }
            }    
            ?>
        </table>
    </form>
</div>
<?php require_once './Rodape.html'; ?>