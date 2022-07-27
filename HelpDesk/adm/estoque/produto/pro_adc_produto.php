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

include '../../../../db.php';

$data_abertura = $_POST['data'];
$id_soli = $_POST['id_adc'];
$nome = $_POST['nome'];
$codigo = $_POST['codigo'];
//$valor = $_POST['valor'];
$categoria = $_POST['categoria'];
$fornecedor = $_POST['fornecedor'];
$marca = $_POST['marca'];
$local = $_POST['local'];
$filial = $_POST['filial'];
$status = $_POST['status'];
$obs = $_POST['obs'];

$query = "INSERT INTO produtos(nome_produto, codigo_produto, fornecedor, categoria, data_adc, status, id_adc,marca, obs, local, filial) VALUES ('$nome', '$codigo', '$fornecedor', '$categoria', '$data_abertura','$status', '$id_soli', '$marca', '$obs', '$local', '$filial')";

$result = mysqli_query($conexao, $query);

if(!$result){
	$hoje = date('d/m/Y');
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
	
	echo'<p >Erro: '.mysqli_error($conexao).'</p>';
	echo '
		<p >Data:'.$hoje.'</p>
		<p >URL:'.$url.'</p>

	';
	echo'
	<p >Favor entrar em contato com Administrador no email helpdesk@vhdwebsites.com.br e anexar print desta tela.</p>
	<br>
	<br>
	<a href="../../../../index.php?page=produto">Retornar</a>';
	
	
	
}else{
	include('../../../../db.php');
	include('../../../Administracao/log/log.php');
	$mensagem = "ADC PRODUTO";
	$login = $_SESSION['UsuarioNome'];
	salvaLog($mensagem,$login);
	echo "<script>
	alert('Adicionado com sucesso'); location= '../../../../index.php?page=produto';
	</script>";
}

?>