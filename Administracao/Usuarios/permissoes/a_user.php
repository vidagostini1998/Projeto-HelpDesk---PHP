<?php

if(isset($_POST['id'])){
	if(isset($_POST['user1'])){

		$user1 = $_POST['user1'];
	}else{
		$user1=0;
	}

	if(isset($_POST['user2'])){
		
		$user2 = $_POST['user2'];
	}else{
		$user2 = 0;
	}

	if(isset($_POST['user3'])){
		$user3 = $_POST['user3'];
	}else{
		$user3 = 0;
	}

	if(isset($_POST['user4'])){
		
		$user4 = $_POST['user4'];
	}else{
		$user4 = 0;
	}
	$query_a_user = "UPDATE a_usuarios SET criar='$user1', alterar='$user2', excluir = '$user3', consultar='$user4' WHERE user = '$id'";
	$result_a_user = mysqli_query($conexao_perm, $query_a_user);
	if(!$result_a_user){
		$hoje = date('d/m/Y');
		$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			
			
		echo'<p >Erro: '.mysqli_error($conexao_perm).'</p>';
		echo '
				<p >Data:'.$hoje.'</p>
				<p >URL:'.$url.'</p>
		
			';
		echo'
			<p >Favor entrar em contato com Administrador no email helpdesk@vhdwebsites.com.br e anexar print desta tela.</p>
			<br>
			<br>
			<a href="../../../index.php?page=usuarios">Retornar</a>';
			
	}else{}

}
else{
	if(isset($_POST['user1'])){

		$user1 = $_POST['user1'];
	}else{
		$user1=0;
	}

	if(isset($_POST['user2'])){
		
		$user2 = $_POST['user2'];
	}else{
		$user2 = 0;
	}

	if(isset($_POST['user3'])){
		$user3 = $_POST['user3'];
	}else{
		$user3 = 0;
	}

	if(isset($_POST['user4'])){
		
		$user4 = $_POST['user4'];
	}else{
		$user4 = 0;
	}
	$query_a_user = "INSERT INTO a_usuarios(user, criar, alterar, excluir, consultar) VALUES ('$user', '$user1', '$user2', '$user3', '$user4')";
		$result_a_user = mysqli_query($conexao_perm, $query_a_user);
		if(!$result_a_user){
			$hoje = date('d/m/Y');
			$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			
			
			echo'<p >Erro: '.mysqli_error($conexao_perm).'</p>';
			echo '
				<p >Data:'.$hoje.'</p>
				<p >URL:'.$url.'</p>
		
			';
			echo'
			<p >Favor entrar em contato com Administrador no email helpdesk@vhdwebsites.com.br e anexar print desta tela.</p>
			<br>
			<br>
			<a href="../../../index.php?page=usuarios">Retornar</a>';
			
	}else{}

}

