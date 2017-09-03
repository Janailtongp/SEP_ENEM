    <?php
    $titulo1 = 'Editar questão';
    $titulo2 = 'Editar questão';
    require_once './Topo.phtml';
    
    if (isset($_GET['id'])){
                    $id = (int)$_GET['id'];
                    $conn = F_conect();
                    $result = mysqli_query($conn, "Select * from questao where idQuestao=" . $id);
                      if (mysqli_num_rows($result) >=1){
                            while ($row = $result->fetch_assoc()) {
                                $enun=$row['enunciado'];
                                $AltA=$row['altA'];
                                $AltB=$row['altB'];
                                $AltC=$row['altC'];
                                $AltD=$row['altD'];
                                $AltE=$row['altE'];
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

        <?php
            require_once '../Controller/QuestaoController.php';
            if (isset($_POST["cadastrar"])) {
                $objControl = new QuestaoController();
                $objControl->editarQuestao($_POST["enunciado"], $_POST["altA"], $_POST["altB"], $_POST["altC"], $_POST["altD"], $_POST["altE"], $id);
            }
        ?> 
        <br />
        <br />
        <form action="" method="post">
            <div class="input-group">
                <span class="input-group-addon">Enuncuado</span>
            </div> 
            <textarea class="ckeditor" name="enunciado" required="required"><?php echo $enun;?></textarea><br/>
            
            
            <div class="input-group">
                <span class="input-group-addon">Alternativa A</span>
            </div> 
            <textarea class="ckeditor" name="altA" required="required"><?php echo $AltA;?></textarea><br/>
            
            
            <div class="input-group">
                <span class="input-group-addon">Alternativa B</span>
            </div> 
            <textarea class="ckeditor" name="altB" required="required"><?php echo $AltB;?></textarea><br/>
            
            <div class="input-group">
                <span class="input-group-addon">Alternativa C</span>
            </div> 
            <textarea class="ckeditor" name="altC" required="required"><?php echo $AltC;?></textarea><br/>
            
            <div class="input-group">
                <span class="input-group-addon">Alternativa D</span>
            </div> 
            <textarea class="ckeditor" name="altD" required="required"><?php echo $AltD;?></textarea><br/>
            
            <div class="input-group">
                <span class="input-group-addon">Alternativa E</span>
            </div> 
            <textarea class="ckeditor" name="altE" required="required"><?php echo $AltE;?></textarea><br/>
            
            <input type="submit" class="btn btn-success" name="cadastrar" value="Atualizar"> 
        </form>    

    <?php require_once './Rodape.html'; ?>
