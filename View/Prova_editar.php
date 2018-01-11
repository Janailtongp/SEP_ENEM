<?php
$titulo1 = 'Editar Prova';
$titulo2 = 'Editar Prova';
require_once './Topo.phtml';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    include '../Controller/ProvaController.php';
    $objProva = new ProvaController();
    $prova = $objProva->ProvaEditavel($_SESSION['idUSU'], $id);
    $titulo = $prova[0]['TITULO'];
    $assunto = $prova[0]['ASSUNTO'];
    $ID_PROVA = $prova[0]['ID_PROVA'];
} else {
    echo "<script language= 'JavaScript'>
                                        location.href='erro.php'
                                </script>";
}


if(isset($_POST['cadastrar'])){
        
        $objProva->EditarProva($_POST['titulo'], $_POST['assunto'], $_POST['id_simulado'], $ID_PROVA);
        
    }
?>


<form method="post" action="">
    <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <div class="input-group">
            <span class="input-group-addon">Título</span>
        </div>
        <input type="text" class="form-control" placeholder="Título" name="titulo" value="<?php echo $titulo;?>"/><br/>


         <div class="input-group">
            <span class="input-group-addon">Assunto</span>
        </div><?php
        $area = NomeArea($assunto);
        ?>
        <select name="assunto" class="form-control" >
                <option value="<?php echo $assunto;?>" selected="selected"><?php echo $area;?></option>
                <option value="1">Ciências da Natureza e suas Tecnologias</option>
                <option value="2">Ciências Humanas e suas Tecnologias</option>
                <option value="3">Linguagens, Códigos e suas Tecnologias</option>
                <option value="4">Matemática e suas Tecnologias</option>
            </select><br/>
        
        <div class="input-group">
            <span class="input-group-addon">Simulado de destino</span>
        </div>
        <select name="id_simulado" id="id_categoria" class="form-control select2" required="">
        <?php
            
            $vetor = $objProva->SimuladosExistentes(); 
            $tamanho = count($vetor);
            for($i =0; $i<$tamanho;$i++){
            echo "<option value='".$vetor[$i]['ID']."'>".$vetor[$i]['TITULO']."</option>";

            }
            ?>
        </select>
        

        <input type="submit" class="btn btn-success" name="cadastrar" value="Salvar">
    </div>
    
    
</form>
<?php require_once './Rodape.html'; ?>
