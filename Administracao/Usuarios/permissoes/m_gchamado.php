<?php
if(isset($_POST['id'])){
	if(isset($_POST['gc1'])){

		$gc1 = $_POST['gc1'];
	}else{
		$gc1=0;
	}

	if(isset($_POST['gc2'])){
		
		$gc2 = $_POST['gc2'];
	}else{
		$gc2 = 0;
	}

	if(isset($_POST['gc3'])){
		$gc3 = $_POST['gc3'];
	}else{
		$gc3 = 0;
	}

	if(isset($_POST['gc4'])){
		
		$gc4 = $_POST['gc4'];
	}else{
		$gc4 = 0;
	}
	
	

		$query_m_gchamado = "UPDATE m_gchamado SET criar='$gc1', alterar='$gc2', excluir = '$gc3', consultar='$gc4' WHERE user = '$id'";
		$result_m_gchamado = mysqli_query($conexao_perm, $query_m_gchamado);
		if(!$result_m_gchamado){
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
	if(isset($_POST['gc1'])){

		$gc1 = $_POST['gc1'];
	}else{
		$gc1=0;
	}

	if(isset($_POST['gc2'])){
		
		$gc2 = $_POST['gc2'];
	}else{
		$gc2 = 0;
	}

	if(isset($_POST['gc3'])){
		$gc3 = $_POST['gc3'];
	}else{
		$gc3 = 0;
	}

	if(isset($_POST['gc4'])){
		
		$gc4 = $_POST['gc4'];
	}else{
		$gc4 = 0;
	}
	
	

		$query_m_gchamado = "INSERT INTO m_gchamado(user, criar, alterar, excluir, consultar) VALUES ('$user', '$gc1', '$gc2', '$gc3', '$gc4')";
		$result_m_gchamado = mysqli_query($conexao_perm, $query_m_gchamado);
		if(!$result_m_gchamado){
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

