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
$patrimonio = $_POST['patrimonio'];
$nome = $_POST['nome'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$fornecedor = $_POST['fornecedor'];
$obs = $_POST['obs'];
$local = $_POST['local'];
$filial = $_POST['filial'];
$motivo = $_POST['motivo'];
$situ= $_POST['situ'];
$categoria= $_POST['categoria'];
$ref= $_POST['referencia'];


$query = "INSERT INTO patrimonio(patrimonio, data_inclu, nome, marca, modelo, n_serie, fornecedor, obs_patrimonio, situacao, motivo_situ, local_patrimonio, id_user, filial, categoria, ref) VALUES ('$patrimonio', '$data_inclu', '$nome','$marca','$modelo','$serie','$fornecedor','$obs','$situ','$motivo','$local','$id_soli','$filial', '$categoria', '$ref')";

$result = mysqli_query($conexao, $query);

if(!$result){
	$error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<script>location='../../index.php?page=error&erro=".$error."&ip=".$_SERVER['REMOTE_ADDR']."&url=".$url."';</script>";	
}else{
	include('../../db.php');
	include('../../Administracao/log/log.php');
	$mensagem = "ADC EQUIPAMENTO";
	$login = $_SESSION['UsuarioNome'];
	salvaLog($mensagem,$login);
	echo "<script>
	alert('Adicionado com sucesso'); location= '../../index.php?page=consulta_equi';
	</script>";
}

?>