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

$id = $_POST['id_manut'];
$data_manut = $_POST['data_manut'];
if($_POST['data_realizado'] == ""){
    $data_realizado = "0000-00-00";
}
else{
    $data_realizado = $_POST['data_realizado'];
}
$solicitante = $_POST['solicitante'];
$tipo = $_POST['tipo'];
$prestador = $_POST['prestador'];
$motivo = $_POST['motivo'];
$problema = $_POST['problema'];
$solucao = $_POST['solucao'];
$obs = $_POST['obs'];
$patrimonio = $_POST['patrimonio'];
$local = $_POST['local'];
$filial = $_POST['filial'];
$chamado = $_POST['chamado'];
$finalizado = $_POST['finalizado'];


if($chamado == 0){
    $query = "UPDATE manutencao SET data_manut = '$data_manut', data_realizada = '$data_realizado', solicitante = '$solicitante', tipo = '$tipo', motivo = '$motivo', problema = '$problema', solucao = '$solucao', prestador = '$prestador', obs = '$obs', finalizado = '$finalizado', patrimonio = '$patrimonio', local = '$local', filial = '$filial', chamado = NULL WHERE id_manut = '$id'";
}
else{
    $query = "UPDATE manutencao SET data_manut = '$data_manut', data_realizada = '$data_realizado', solicitante = '$solicitante', tipo = '$tipo', motivo = '$motivo', problema = '$problema', solucao = '$solucao', prestador = '$prestador', obs = '$obs', finalizado = '$finalizado', patrimonio = '$patrimonio', local = '$local', filial = '$filial', chamado = '$chamado' WHERE id_manut = '$id'";
}



$result = mysqli_query($conexao, $query);

if(!$result){
	$error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<script>location='../../../index.php?page=error&erro=".$error."&ip=".$_SERVER['REMOTE_ADDR']."&url=".$url."';</script>";	
}else{
	include('../../../db.php');
	include('../../../Administracao/log/log.php');
	$mensagem = "ALTERADO MANUTENÇÃO ID: ".$id;
	$login = $_SESSION['UsuarioNome'];
	salvaLog($mensagem,$login);
	echo "<script>
	alert('Alterado com sucesso'); location= '../../../index.php?page=consulta_manutencao';
	</script>";
}

?>