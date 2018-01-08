<?php
$titulo1 = 'Listar simulados';
$titulo2 = 'Listar simulados';
require_once './Topo.phtml';
?>

   <div class="col-md-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                require '../Controller/SimuladoController.php';
                    $obj = new SimuladoController();
                   $vetor = $obj->ListarSimulados();
                ?>
            </tbody>
            <?php
            $tamanho = count($vetor);
            if($tamanho > 0){
                for($i =0; $i<$tamanho; $i++){
                    echo"<tr><td>" . $vetor[$i]['TITULO']  . "</td>";
                    echo"<td>" .     $vetor[$i]['DATA'] . "</td>";
                    echo"<td>" .     $vetor[$i]['DESC'] . "</td>";
                    echo"<td><a href=Simulado_editar.php?id=" . $vetor[$i]['ID'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                                <a onclick='return confirmar();' href=Simulado_excluir.php?id=" . $vetor[$i]['ID'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
                }
            }    
            ?>
        </table>
    </div>
<?php require_once './Rodape.html'; ?>