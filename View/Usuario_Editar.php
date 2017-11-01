    <?php
    $titulo1 = 'Editar usuário';
    $titulo2 = 'Editar usuário';
    require_once './Topo.phtml';
    
    if (isset($_GET['id'])){
                    $id = (int)$_GET['id'];
                    $conn = F_conect();
                    $result = mysqli_query($conn, "Select * from usuario where idAdmin=" . $id);
                      if (mysqli_num_rows($result) >=1){
                            while ($row = $result->fetch_assoc()) {
                                $nome=$row['nome'];
                                $email=$row['email'];
                                $senha=$row['senha'];
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
            require_once '../Controller/UsuarioController.php';
            if (isset($_POST["cadastrar"])) {
                $objControl = new UsuarioController();
                $objControl->EditarProfessor($_POST["nome"], $_POST["email"], $_POST["nivel"], $_POST["senha"], $_POST["C_senha"], $id);
            }
        ?> 
        <br />
        <form method="post" action="" id="FormSenha" name="FormSenha" onsubmit="return validarSenha();">
            <div class="input-group">
                <span class="input-group-addon">Nome</span>
            </div>
            <input type="text" class="form-control" placeholder="Nome" name="nome" required="required" value="<?php echo $nome;?>"/><br/>


            <div class="input-group">
                <span class="input-group-addon">E-mail</span>
            </div>
            <input type="email" class="form-control" placeholder="E-mail" name="email" required="required" value="<?php echo $email;?>"/><br/>


            <div class="input-group">
                <span class="input-group-addon">Nível de usuário</span>
            </div>
            <select name="nivel" class="form-control" >
                <option value="1" selected="selected">Professor</option>
                <option value="2">Cordenador</option>
            </select><br/>

            <div class="input-group">
                <span class="input-group-addon">Senha</span>
            </div>
            <input type="password" class="form-control" placeholder="Senha" name="senha" required="required" value="<?php echo $senha;?>"/><br/>


            <div class="input-group">
                <span class="input-group-addon">Confirmar senha</span>
            </div>
            <input type="password" class="form-control" placeholder="Confirmar senha" name="C_senha" required="required"/><br/>

            <input type="submit" class="btn btn-success" name="cadastrar" value="Cadastrar"> 
        </form>           
    </div>

    <?php require_once './Rodape.html'; ?>
