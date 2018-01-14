<?php
$titulo1 = 'Lista de Provas pro simulado';
$titulo2 = 'Lista de Provas pro simulado';
require_once './Topo.phtml';
?>

<?php
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
?>
<div class="col-md-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Área</th>
                    <th>Simulado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                require '../Controller/SimuladoController.php';
                    $obj = new SimuladoController();
                   $vetor = $obj->ListarProvas_simulado($id);
                ?>
            </tbody>
            <?php
            $tamanho = count($vetor);
            if($tamanho > 0){
                for($i =0; $i<$tamanho; $i++){
                    echo"<tr><td>" . $vetor[$i]['TITULO']  . "</td>";
                    echo"<td>" .     $vetor[$i]['ASSUNTO'] . "</td>";
                    echo"<td>" .     $vetor[$i]['ID_SIMULADO'] . "</td>";
                    echo"<td><a href=Questoes_PorProva.php?id=" . $vetor[$i]['ID_PROVA'] ."><i class='fa fa-file-text-o' aria-hidden='true'></i> </a>";
                    echo"<a href=Questao_selecionar.php?id=" . $vetor[$i]['ID_PROVA'] . "&area=".$vetor[$i]['ASSUNTO_ID']."><i class='fa fa-plus-square-o' aria-hidden='true'></i></a></td></tr>";
                }
            }    
            ?>
        </table>

    </div>


<?php require_once './Rodape.html'; ?>