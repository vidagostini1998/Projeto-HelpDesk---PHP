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

$data_abertura = $_POST['data_ab'];
$id_soli = $_POST['solicitante'];
$problema = $_POST['problema'];
$obs = $_POST['obs'];
$categoria = $_POST['categoria1'];
$patrimonio = $_POST['patrimonio'];
$local = $_POST['local'];
$filial = $_POST['filial'];
$quantidade = $_POST['quantidade'];
$medida = $_POST['medida'];


	$query = "INSERT INTO chamados_insumos(data_chamado, solicitante, descricao, obs, categoria, patrimonio, local, filial, medida, quantidade) VALUES ('$data_abertura', '$id_soli', '$problema', '$obs', '$categoria','$patrimonio', '$local', '$filial', '$medida', '$quantidade')";


$result = mysqli_query($conexao, $query);

if(!$result){
	$error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<script>location='../../index.php?page=error&erro=".$error."&ip=".$_SERVER['REMOTE_ADDR']."&url=".$url."';</script>";	
}else{
	include('../../db.php');
	include('../../Administracao/log/log.php');
	$mensagem = "ADC CHAMADO INSUMO";
	$login = $_SESSION['UsuarioNome'];
	salvaLog($mensagem,$login);
	echo "<script>
	alert('Adicionado com sucesso'); location= '../../index.php?page=inicio_helpdesk';
	</script>";
}

?>