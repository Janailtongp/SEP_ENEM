<?php
$titulo1 = 'Listar usuários';
$titulo2 = 'Lista de usuários';
require_once './Topo.phtml';
?>

    <div class="col-md-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                require '../Controller/UsuarioController.php';
                    $obj = new UsuarioController();
                    $obj->ListarProfessores();
                ?>
            </tbody>
        </table>

    </div>
<?php require_once './Rodape.html'; ?>