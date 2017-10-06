<?php
$titulo1 = 'Teste';
$titulo2 = 'Bem vindo';
require_once './Topo.phtml';
?>
<?php
if (isset($_POST['Quest'])) {
    $checked = $_POST['Quest'];
    for ($i = 0; $i < count($checked); $i++) {
        echo "Selected " . $checked[$i] . "<br/>";
    }
} else {
    echo 'NADA SELECIONADO!!!';
}
?>

Aqui é todo o corpo particular do Sistema por página!




<?php require_once './Rodape.html'; ?>