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

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$user = $_POST['usuario'];
$senha = $_POST['senha'];

$query_u = "SELECT * FROM users WHERE pass = '$senha'";
$consulta_u = mysqli_query($conexao,$query_u);

if (mysqli_num_rows($consulta_u) != 1){
$senha1 = hash("sha256",$senha);
}
else{
$senha1 = $senha;
}

$query = "UPDATE users SET nome = '$nome', email = '$email', user = '$user', pass='$senha1' WHERE id='$id'; ";

$result = mysqli_query($conexao, $query);



if(!$result){

	$error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<script>location='../../index.php?page=error&erro=".$error."&ip=".$_SERVER['REMOTE_ADDR']."&url=".$url."';</script>";	
	
}else{
	include('../../db.php');
	include('./permissoes/db_perm.php');
	include('./permissoes/a_log.php');
	include('./permissoes/a_user.php');
	include('./permissoes/m_categoria.php');
	include('./permissoes/m_chamado.php');
	include('./permissoes/m_equipamento.php');
	include('./permissoes/m_filial.php');
	include('./permissoes/m_gchamado.php');
	include('./permissoes/m_gmanutencao.php');
	include('./permissoes/m_local.php');
	include('../log/log.php');
	$mensagem = "ALTERAR USUARIO ID Nº ".$id;
	$login = $_SESSION['UsuarioNome'];
	salvaLog($mensagem,$login);
	echo "<script>
	alert('Alterado com sucesso'); location= '../../../index.php?page=usuarios';
	</script>";
}

?>