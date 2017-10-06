<?php
$titulo1 = 'Listar usuários';
$titulo2 = 'Lista de usuários';
require_once './Topo.phtml';
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

                <?php
                require '../Controller/QuestaoController.php';
                $obj = new QuestaoController();
                $obj->ListarQestoesProva();
                ?>
            </tbody>
        </table>
        <input type="submit" class="btn btn-success" name="cadastrar" value="Adicionar a Prova"> 
    </form>
</div>
<?php require_once './Rodape.html'; ?>