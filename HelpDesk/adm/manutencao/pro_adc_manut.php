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

$id_soli = $_POST['id_soli'];


if($_POST['data_manut'] == ""){
	$data_manut ="0000-00-00";
}
else{
	$data_manut = $_POST['data_manut'];
}
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
    $query = "INSERT INTO manutencao(data_manut, data_realizada,solicitante, tipo, motivo, problema, solucao, prestador, obs, finalizado, patrimonio, local, filial, id_soli) VALUES ('$data_manut', '$data_realizado', '$solicitante', '$tipo','$motivo', '$problema', '$solucao', '$prestador', '$obs', '$finalizado', '$patrimonio', '$local', '$filial','$id_soli')";
}
else{
    $query = "INSERT INTO manutencao(data_manut, data_realizada,solicitante, tipo, motivo, problema, solucao, prestador, obs, finalizado, patrimonio, local, filial, chamado, id_soli) VALUES ('$data_manut', '$data_realizado', '$solicitante', '$tipo','$motivo', '$problema', '$solucao', '$prestador', '$obs', '$finalizado', '$patrimonio', '$local', '$filial', '$chamado', '$id_soli')";
}



$result = mysqli_query($conexao, $query);
$mid = mysqli_insert_id($conexao);

if(!$result){
	$error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<script>location='../../../index.php?page=error&erro=".$error."&ip=".$_SERVER['REMOTE_ADDR']."&url=".$url."';</script>";	
	
}else{
	include('../../../db.php');
	include('../../../Administracao/log/log.php');
	$mensagem = "ADC MANUTENÇÃO ID nº ".$mid;
	$login = $_SESSION['UsuarioNome'];
	salvaLog($mensagem,$login);
	echo "<script>
	alert('Adicionado com sucesso'); location= '../../../index.php?page=consulta_manutencao';
	</script>";
}

?>