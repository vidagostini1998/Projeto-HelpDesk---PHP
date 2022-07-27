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

$id_adc = $_POST['id_adc'];
$data = $_POST['data'];
$produto = $_POST['produto'];
$quantidade = $_POST['quantidade'];
$valor_unitario = $_POST['valor'];
$total = $quantidade * $valor_unitario;


$query = "INSERT INTO entrada(produto, quantidade, data_entrada, id_adc, valor_unitario, valor_total) VALUES ('$produto', '$quantidade', '$data', '$id_adc', '$valor_unitario','$total')";

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
	include('../../../../Administracao/log/log.php');
	$mensagem = "ADC ENTRADA ESTOQUE PRODUTO ID Nº".$produto;
	$login = $_SESSION['UsuarioNome'];
	salvaLog($mensagem,$login);
	echo "<script>
	alert('Adicionado com sucesso'); location= '../../../../index.php?page=movimentacao';
	</script>";
}

?>