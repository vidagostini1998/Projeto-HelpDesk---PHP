<?php

if(isset($_POST['id'])){

	if(isset($_POST['log4'])){		
		$log4 = $_POST['log4'];
	}
	else{
		$log4 = 0;
	}
	
	$query_a_log = "UPDATE a_log SET consultar='$log4' WHERE user = '$id'";
	$result_a_log = mysqli_query($conexao_perm, $query_a_log);
	if(!$result_a_log){
		$hoje = date('d/m/Y');
		$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";		
				
		echo'<p >Erro: '.mysqli_error($conexao_perm).'</p>';
		echo '<p>Data:'.$hoje.'</p> <p>URL:'.$url.'</p>	';
		echo'<p >Favor entrar em contato com Administrador no email helpdesk@vhdwebsites.com.br e anexar print desta tela.</p><br><br><a href="../../../index.php?page=usuarios">Retornar</a>';
				
		}else{}
}
else{

	if(isset($_POST['log4'])){		
		$log4 = $_POST['log4'];
	}
	else{
		$log4 = 0;
	}
	
	$query_a_log = "INSERT INTO a_log(user, consultar) VALUES ('$user','$log4')";
	$result_a_log = mysqli_query($conexao_perm, $query_a_log);
	if(!$result_a_log){
		$hoje = date('d/m/Y');
		$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";		
				
		echo'<p >Erro: '.mysqli_error($conexao_perm).'</p>';
		echo '<p>Data:'.$hoje.'</p> <p>URL:'.$url.'</p>	';
		echo'<p >Favor entrar em contato com Administrador no email helpdesk@vhdwebsites.com.br e anexar print desta tela.</p><br><br><a href="../../../index.php?page=usuarios">Retornar</a>';
				
		}else{}

}