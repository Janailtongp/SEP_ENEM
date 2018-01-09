<?php
$titulo1 = 'Listar Assuntos';
$titulo2 = 'Listar Assuntos';
require_once './Topo.phtml';
?>

   <div class="col-md-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Área</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                require '../Controller/AssuntoController.php';
                    $obj = new AssuntoController();
                   $vetor = $obj->ListarAssuntos();
                ?>
            </tbody>
            <?php
            $tamanho = count($vetor);
            if($tamanho > 0){
                for($i =0; $i<$tamanho; $i++){
                   echo"<tr><td>" . $vetor[$i]['TITULO']  . "</td>";
                   $area = "Não encontrada";
                   if($vetor[$i]['AREA'] == 1){
                           $area = "Ciências da Natureza e suas Tecnologias";
                   }else if ($vetor[$i]['AREA'] == 2){
                           $area = "Ciências Humanas e suas Tecnologias";
                   }else if ($vetor[$i]['AREA'] == 3){
                           $area = "Linguagens, Códigos e suas Tecnologias";
                   }else if ($vetor[$i]['AREA'] == 4){
                           $area = "Matemática e suas Tecnologias";
                   }
                    echo"<td>".$area. "</td>";
                    echo"<td><a href=Assunto_editar.php?id=" . $vetor[$i]['ID'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td></tr>";
                }
            }    
            ?>
        </table>
    </div>
<?php require_once './Rodape.html'; ?>