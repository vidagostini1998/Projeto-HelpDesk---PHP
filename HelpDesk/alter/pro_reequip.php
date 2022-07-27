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

$id = $_POST['id_chamado'];
$data_inclu = $_POST['data_ab'];
$data_conclu = $_POST['data_conclu'];
$id_soli = $_POST['solicitante'];
$problema = $_POST['problema'];
$solucao = $_POST['solucao'];
$obs = $_POST['obs'];
$categoria = $_POST['categoria'];
$patrimonio = $_POST['patrimonio'];
$local = $_POST['local'];
$id_reso = $_POST['id_reso'];
$nome_reso = $_POST['soli'];
$filial = $_POST['filial'];


$query = "UPDATE chamados_patrimonio SET data_chamado = '$data_inclu', data_conclusão = '$data_conclu', solicitante = '$id_soli', problema = '$problema', solucao = '$solucao', obs = '$obs', categoria = '$categoria', patrimonio = '$patrimonio', local = '$local', id_reso = '$id_reso',nome_reso = '$nome_reso', resolvido = 1, filial = '$filial'  WHERE id = '$id'";
$data = date('Y-m-d H:i:s');
$result = mysqli_query($conexao, $query);


if(!$result){
	$error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<script>location='../../index.php?page=error&erro=".$error."&ip=".$_SERVER['REMOTE_ADDR']."&url=".$url."';</script>";	
}else{
	$query2 ="INSERT INTO atualizacao(data,descricao,soli,id_equip) VALUES ('$data','Chamado em espera para resolução','$id_soli','$id');";
	$result2 = mysqli_query($conexao, $query2);
	if(!$result2){
		$error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<script>location='../../index.php?page=error&erro=".$error."&ip=".$_SERVER['REMOTE_ADDR']."&url=".$url."';</script>";	
	}
	else{
		include('../../db.php');
		include('../../Administracao/log/log.php');
		$mensagem = "CHAMADO EQUIPAMENTO EM ESPERA DE RESOLUÇÃO ID Nº ".$id;
		$login = $_SESSION['UsuarioNome'];
		salvaLog($mensagem,$login);
		echo "<script>
		alert('Resolvido com sucesso'); location='../../index.php?page=inicio_helpdesk';
		</script>";
	}
	
}

?>