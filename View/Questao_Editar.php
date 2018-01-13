<?php
$titulo1 = 'Editar questão';
$titulo2 = 'Editar questão';
require_once './Topo.phtml';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    require_once '../Controller/QuestaoController.php';
    $objControl = new QuestaoController();
    $vetor = $objControl->BuscarQuestao($id);
} else {
    echo "<script language= 'JavaScript'>
                                            location.href='erro.php'
                                    </script>";
}
if (isset($_POST["cadastrar"])) {
    $objControl = new QuestaoController();
     if(!empty($_POST["disciplina"]) AND !empty($_POST["assunto"])){
    $objControl->editarQuestao($_POST["enunciado"], $_POST["altA"], $_POST["altB"], $_POST["altC"], $_POST["altD"], $_POST["altE"],$_POST["correta"],$_POST["disciplina"], $_POST["assunto"], $id);
     }else{
       Alert("Ops!", "Preencha área de conhecimento e assunto!", "danger");
   }
}
?> 
<br />
<br />
<form action="" method="post">
    <div class="input-group">
                <span class="input-group-addon">Área</span>
            </div>
            <select name="disciplina" id="disciplina"  class="form-control" >
                <option value="">Escolha a Área</option>
                <option value="1">Ciências da Natureza e suas Tecnologias</option>
                <option value="2">Ciências Humanas e suas Tecnologias</option>
                <option value="3">Linguagens, Códigos e suas Tecnologias</option>
                <option value="4">Matemática e suas Tecnologias</option>
            </select><br/>
        <div class="input-group">
                <span class="input-group-addon">Assunto por Área</span>
        </div>
	<span class="carregando">Aguarde, carregando...</span>
	<select name="assunto" id="assunto" class="form-control">
            <option value="">Escolha o Assunto</option>
	</select>
        <br>
    
    <div class="input-group">
        <span class="input-group-addon">Enuncuado</span>
    </div> 
    <textarea class="ckeditor" name="enunciado" required="required"><?php echo $vetor[0]; ?></textarea><br/>


    <div class="input-group">
        <span class="input-group-addon">Alternativa A</span>
    </div> 
    <textarea class="ckeditor" name="altA" required="required"><?php echo $vetor[1]; ?></textarea><br/>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-default">
            <input type="radio" name="correta" value="0" checked  > Correta</label>

        <br/>
        <br/>

        <div class="input-group">
            <span class="input-group-addon">Alternativa B</span>
        </div> 
        <textarea class="ckeditor" name="altB" required="required"><?php echo $vetor[2]; ?></textarea><br/>
        <label class="btn btn-default"><input type="radio" name="correta" value="1" > Correta</label>
        <br/>
        <br/>

        <div class="input-group">
            <span class="input-group-addon">Alternativa C</span>
        </div> 
        <textarea class="ckeditor" name="altC" required="required"><?php echo $vetor[3]; ?></textarea><br/>
        <label class="btn btn-default"><input type="radio" name="correta" value="1" > Correta</label>
        <br/>
        <br/>

        <div class="input-group">
            <span class="input-group-addon">Alternativa D</span>
        </div> 
        <textarea class="ckeditor" name="altD" required="required"><?php echo $vetor[4]; ?></textarea><br/>
        <label class="btn btn-default"><input type="radio" name="correta" value="1" > Correta</label>
        <br/>
        <br/>

        <div class="input-group">
            <span class="input-group-addon">Alternativa E</span>
        </div> 
        <textarea class="ckeditor" name="altE" required="required"><?php echo $vetor[5]; ?></textarea><br/>
        <label class="btn btn-default"><input type="radio" name="correta" value="1" > Correta</label>
        <br/>
        <br/>
    </div>
    <input type="submit" class="btn btn-success" name="cadastrar" value="Atualizar"> 
</form>    

<?php require_once './Rodape.html'; ?>

<!--LISTAR ASSUNTOS POR ÁREA-->
                <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		google.load("jquery", "1.4.2");
                </script>
                <script type="text/javascript">
		$(function(){
			$('#disciplina').change(function(){
				if( $(this).val() ) {
					$('#assunto').hide();
					$('.carregando').show();
					$.getJSON('ajax_assunto.php?search=',{disciplina: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha o Assunto</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].titulo + '</option>';
						}	
						$('#assunto').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#assunto').html('<option value="">– Nenhum assunto para essa Área –</option>');
				}
			});
		});
		</script>