<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: ../../index.php"); exit;
}

include '../../../db.php';

$id = $_POST['id_chamado'];
$data_inclu = $_POST['data_ab'];
if($_POST['data_conclu'] == ""){
	$data_conclu = "0000-00-00";
}
else{
	$data_conclu = $_POST['data_conclu'];
}
$descricao = $_POST['descricao'];
$solucao = $_POST['solucao'];
$obs = $_POST['obs'];
$categoria = $_POST['categoria'];
$patrimonio = $_POST['patrimonio'];
$local = $_POST['local'];
$filial = $_POST['filial'];
$medida = $_POST['medida'];
$quantidade= $_POST['quantidade'];


$query = "UPDATE chamados_insumos SET data_chamado = '$data_inclu', data_conclusão = '$data_conclu', descricao = '$descricao', solucao = '$solucao', obs = '$obs', categoria = '$categoria', patrimonio = '$patrimonio', local = '$local', filial = '$filial', medida='$medida', quantidade = '$quantidade' WHERE id = '$id'";


$result = mysqli_query($conexao, $query);


if(!$result){
	$error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<script>location='../../../index.php?page=error&erro=".$error."&ip=".$_SERVER['REMOTE_ADDR']."&url=".$url."';</script>";	
}else{
	include('../../../db.php');
	include('../../../Administracao/log/log.php');
	$mensagem = "ALTERAR CHAMADO INSUMO ID Nº ".$id;
	$login = $_SESSION['UsuarioNome'];
	salvaLog($mensagem,$login);
	echo "<script>
	alert('Alterado com sucesso'); location='../../../?page=chamados';
	</script>";
}

?>