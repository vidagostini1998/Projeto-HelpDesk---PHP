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

include '../../../db.php';

$id = $_POST['id'];
$id_soli = $_SESSION['UsuarioID'];
$query = "UPDATE chamados_insumos SET resolvido = '0' WHERE id = '$id'";
$data = date('Y-m-d h:i:s');



$result = mysqli_query($conexao, $query);


if(!$result){
	$error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<script>location='../../../index.php?page=error&erro=".$error."&ip=".$_SERVER['REMOTE_ADDR']."&url=".$url."';</script>";
	
}else{
	$query2 ="INSERT INTO atualizacao(data,descricao,soli,id_insu) VALUES ('$data','Reaberto Chamado','$id_soli','$id');";
	$result2 = mysqli_query($conexao, $query2);
	if(!$result2){
		$error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<script>location='../../../index.php?page=error&erro=".$error."&ip=".$_SERVER['REMOTE_ADDR']."&url=".$url."';</script>";
	}
	else{
		include('../../../db.php');
		include('../../../Administracao/log/log.php');
		$mensagem = "REABERTO CHAMADO INSUMO ID Nº ".$id;
		$login = $_SESSION['UsuarioNome'];
		salvaLog($mensagem,$login);
		echo "<script>
		alert('Reaberto com sucesso'); location='../../../?page=chamados';
		</script>";
	}
	
}

?>