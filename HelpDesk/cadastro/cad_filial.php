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

include '../../db.php';

$data_inclu = $_POST['data_ab'];
$id_soli = $_POST['solicitante'];
$nome_filial = mysqli_real_escape_string($conexao , $_POST['filial']);



$query = "INSERT INTO filial(nome_filial, data_adc, id_adc) VALUES ('$nome_filial', '$data_inclu', '$id_soli')";

$result = mysqli_query($conexao, $query);

if(!$result){
	$error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<script>location='../../index.php?page=error&erro=".$error."&ip=".$_SERVER['REMOTE_ADDR']."&url=".$url."';</script>";		
}else{
	include('../../db.php');
	include('../../Administracao/log/log.php');
	$mensagem = "ADC FILIAL";
	$login = $_SESSION['UsuarioNome'];
	salvaLog($mensagem,$login);
	echo "<script>
	alert('Adicionado com sucesso'); location= '../../index.php?page=consulta_filial';
	</script>";
}

?>