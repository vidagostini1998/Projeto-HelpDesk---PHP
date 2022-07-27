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

$id = $_POST['id'];
$produto = $_POST['produto'];


$query = "DELETE FROM saida WHERE id_saida = '$id'";

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
	<a href="../../../../index.php?page=movimentacao">Retornar</a>';
	
	
	
}else{
	include('../../../../db.php');
	include('../../../Administracao/log/log.php');
	$mensagem = "EXCLUIDO SAIDA ESTOQUE PRODUTO ID Nº".$produto;
	$login = $_SESSION['UsuarioNome'];
	salvaLog($mensagem,$login);
	echo "<script>
	alert('Excluido com sucesso'); location= '../../../../index.php?page=movimentacao';
	</script>";
}

?>