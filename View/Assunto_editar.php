    <?php
    $titulo1 = 'Editar Assunto';
    $titulo2 = 'Editar Assunto';
    require_once './Topo.phtml';
    
    
    if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    include '../Controller/AssuntoController.php';
    $objAssunto = new AssuntoController();
    $vet = $objAssunto->RecuperarAssunto($id);
    $titulo = $vet[0]['TITULO'];
    $Area = $vet[0]['AREA'];
    $area = NomeArea($Area);
    } else {
        echo "<script language= 'JavaScript'>
                                            location.href='erro.php'
                                    </script>";
    }
  ?>

    <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8 " >
        <?php
            if (isset($_POST["cadastrar"])) {
                $objAssunto->EditarAssunto($_POST["titulo"], $_POST["disciplina"], $id);
            }
        ?> 
        <br />
        <form method="post" action="" id="FormSenha" name="FormSenha" onsubmit="return validarSenha();">
            <div class="input-group">
                <span class="input-group-addon">Título</span>
            </div>
            <input type="text" class="form-control" placeholder="Nome" name="titulo" required="required" value="<?php echo $titulo;?>"/><br/>             
            <div class="input-group">
                <span class="input-group-addon">Área</span>
            </div>
            <select name="disciplina" class="form-control" >
                <option value="<?php echo $Area;?>" selected="selected"><?php echo $area;?></option>
                <option value="1">Ciências da Natureza e suas Tecnologias</option>
                <option value="2">Ciências Humanas e suas Tecnologias</option>
                <option value="3">Linguagens, Códigos e suas Tecnologias</option>
                <option value="4">Matemática e suas Tecnologias</option>
            </select><br/>
            
            <input type="submit" class="btn btn-success" name="cadastrar" value="Atualizar"> 
        </form>           
    </div>

    <?php require_once './Rodape.html'; ?>
