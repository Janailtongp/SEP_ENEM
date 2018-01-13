<?php include_once("../Model/connect.php");
$conn = F_conect();

	$id_categoria = $_REQUEST['disciplina'];
	$result_sub_cat = "SELECT * FROM assunto WHERE disciplina = $id_categoria ORDER BY IdAssunto";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$ajax_assunto[] = array(
			'id'	=> $row_sub_cat['IdAssunto'],
			'titulo' => utf8_encode($row_sub_cat['titulo']),
		);
	}
	
	echo(json_encode($ajax_assunto));