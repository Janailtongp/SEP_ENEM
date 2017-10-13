    <?php
    $titulo1 = 'Editar Simulado';
    $titulo2 = 'Editar Simulado';
    require_once './Topo.phtml';
    
    if (isset($_GET['id'])){
                    $id = (int)$_GET['id'];
                    $conn = F_conect();
                    $result = mysqli_query($conn, "Select * from simulado where idsimulado=" . $id);
                      if (mysqli_num_rows($result) >=1){
                            while ($row = $result->fetch_assoc()) {
                                $titulo=$row['titulo'];
                                $data=$row['data_'];
                                $descricao=$row['descricao'];
                             }
                      }else{
                         
                          echo "<script language= 'JavaScript'>
                                        location.href='erro.php'
                                </script>";
                      }
                        $conn->close();
                    
     }else{
                    echo "<script language= 'JavaScript'>
                                        location.href='erro.php'
                                </script>";
        
    }
  ?>

    <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8 " >
        <?php
            require_once '../Controller/SimuladoController.php';
            if (isset($_POST["cadastrar"])) {
                $objControl = new SimuladoController();
                $objControl->EditarSimulado($_POST["titulo"], $_POST["data"], $_POST["descricao"], $id);
            }
        ?> 
        <br />
        <form method="post" action="" id="FormSenha" name="FormSenha" onsubmit="return validarSenha();">
            <div class="input-group">
                <span class="input-group-addon">Título</span>
            </div>
            <input type="text" class="form-control" placeholder="Nome" name="titulo" required="required" value="<?php echo $titulo;?>"/><br/>


            <div class="input-group">
                <span class="input-group-addon">Data</span>
            </div>
            <input type="date" class="form-control" name="data"  value="<?php echo $data;?>"/><br/>


            <div class="input-group">
                <span class="input-group-addon">Descrição</span>
            </div>
            <input type="text" class="form-control" placeholder="Senha" name="descricao" required="required" value="<?php echo $descricao;?>"/><br/>


            <input type="submit" class="btn btn-success" name="cadastrar" value="Atualizar"> 
        </form>           
    </div>

    <?php require_once './Rodape.html'; ?>
