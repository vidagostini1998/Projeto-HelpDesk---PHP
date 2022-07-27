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
$nome = $_POST['nome'];
$cnpj_cpf = $_POST['cnpj_cpf'];
$endereco = $_POST['endereco'];
$tel = $_POST['tel'];
$cel = $_POST['cel'];
$obs = $_POST['obs'];


$query = "INSERT INTO fornecedor(nome_fornecedor, cnpj_cpf, endereco, tel, cel, obs, data_adc, id_adc) VALUES ('$nome', '$cnpj_cpf', '$endereco', '$tel', '$cel','$obs', '$data', '$id_adc')";

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
	<a href="../../../../index.php?page=fornecedores">Retornar</a>';
	
	
	
}else{
	include('../../../../db.php');
	include('../../../../Administracao/log/log.php');
	$mensagem = "ADC FORNECEDOR";
	$login = $_SESSION['UsuarioNome'];
	salvaLog($mensagem,$login);
	echo "<script>
	alert('Adicionado com sucesso'); location= '../../../../index.php?page=fornecedores';
	</script>";
}

?>