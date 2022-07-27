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

$nome = $_POST['nome'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = hash("sha256",($_POST['senha']));



$query = "INSERT INTO users(nome,email,user,pass) VALUES ('$nome', '$email', '$usuario', '$senha')";
$result = mysqli_query($conexao, $query);

$user = mysqli_insert_id($conexao);

if(!$result){
	$error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<script>location='../../index.php?page=error&erro=".$error."&ip=".$_SERVER['REMOTE_ADDR']."&url=".$url."';</script>";	
}else{
	include('../../db.php');
	include('../../Administracao/Usuarios/permissoes/db_perm.php');
	include('./permissoes/a_user.php');
	include('./permissoes/a_log.php');
	include('./permissoes/m_chamado.php');
	include('./permissoes/m_equipamento.php');
	include('./permissoes/m_categoria.php');
	include('./permissoes/m_filial.php');
	include('./permissoes/m_local.php');
	include('./permissoes/m_gchamado.php');
	include('./permissoes/m_gmanutencao.php');
	include('../log/log.php');
	$mensagem = "ADC USUARIO ID Nº".$user;
	$login = $_SESSION['UsuarioNome'];
	salvaLog($mensagem,$login);
	echo "<script>
	alert('Adicionado com sucesso'); location= '../../../index.php?page=usuarios';
	</script>";
}

?>