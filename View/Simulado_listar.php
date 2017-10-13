<?php
$titulo1 = 'Listar simulados';
$titulo2 = 'Listar simulados';
require_once './Topo.phtml';
?>

    <div class="col-md-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                require '../Controller/SimuladoController.php';
                    $obj = new SimuladoController();
                    $obj->ListarSimulados();
                ?>
            </tbody>
        </table>

    </div>
<?php require_once './Rodape.html'; ?>