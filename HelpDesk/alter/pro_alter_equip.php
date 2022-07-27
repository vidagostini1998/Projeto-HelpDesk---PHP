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

$id_patrimonio = $_POST['id_patrimonio'];
$data_inclu = $_POST['data_ab'];
$id_soli = $_POST['solicitante'];
$patrimonio = $_POST['patrimonio'];
$nome = $_POST['nome'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$n_serie = $_POST['serie'];
$fornecedor = $_POST['fornecedor'];
$obs = $_POST['obs'];
$situacao = $_POST['situ'];
$motivo = $_POST['motivo'];
$local = $_POST['local'];
$ref = $_POST['ref'];
$categoria = $_POST['categoria'];
$filial = $_POST['filial'];



$query = "UPDATE patrimonio SET patrimonio = '$patrimonio', data_inclu = '$data_inclu', nome = '$nome', marca = '$marca', modelo = '$modelo', n_serie = '$n_serie', fornecedor = '$fornecedor', obs_patrimonio = '$obs', situacao = '$situacao',motivo_situ = '$motivo', local_patrimonio = '$local', id_user = '$id_soli', ref = '$ref', categoria = '$categoria', filial = '$filial'  WHERE id_patrimonio = '$id_patrimonio'";

$result = mysqli_query($conexao, $query);

if(!$result){
	$error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<script>location='../../index.php?page=error&erro=".$error."&ip=".$_SERVER['REMOTE_ADDR']."&url=".$url."';</script>";
}else{
	include('../../db.php');
	include('../../Administracao/log/log.php');
	$mensagem = "ALTERAR EQUIPAMENTO ID Nº ".$id_patrimonio;
	$login = $_SESSION['UsuarioNome'];
	salvaLog($mensagem,$login);
	echo "<script>
	alert('Alterado com sucesso'); location='../../index.php?page=consulta_equi';
	</script>";
}

?>