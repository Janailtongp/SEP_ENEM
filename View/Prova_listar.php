<?php
$titulo1 = 'Listar Provas';
$titulo2 = 'Listar Provas';
require_once './Topo.phtml';
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
                require '../Controller/ProvaController.php';
                    $obj = new ProvaController();
                   $vetor = $obj->ListarProvas( $_SESSION['idUSU']);
                ?>
            </tbody>
            <?php
            $tamanho = count($vetor);
            if($tamanho > 0){
                for($i =0; $i<$tamanho; $i++){
                    echo"<tr><td>" . $vetor[$i]['TITULO']  . "</td>";
                    echo"<td>" .     $vetor[$i]['ASSUNTO'] . "</td>";
                    echo"<td>" .     $vetor[$i]['ID_SIMULADO'] . "</td>";
                    echo"<td><a href=Prova_editar.php?id=" . $vetor[$i]['ID_PROVA'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                                <a onclick='return confirmar();' href=Prova_excluir.php?id=" . $vetor[$i]['ID_PROVA'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
                }
            }    
            ?>
        </table>

    </div>
<?php require_once './Rodape.html'; ?>