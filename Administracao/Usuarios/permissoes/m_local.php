<?php
if(isset($_POST['id'])){
	if(isset($_POST['lo1'])){

		$lo1 = $_POST['lo1'];
	}else{
		$lo1=0;
	}

	if(isset($_POST['lo2'])){
		
		$lo2 = $_POST['lo2'];
	}else{
		$lo2 = 0;
	}

	if(isset($_POST['lo3'])){
		$lo3 = $_POST['lo3'];
	}else{
		$lo3 = 0;
	}

	if(isset($_POST['lo4'])){
		
		$lo4 = $_POST['lo4'];
	}else{
		$lo4 = 0;
	}
	
	

		$query_m_local = "UPDATE m_local SET criar='$lo1', alterar='$lo2', excluir = '$lo3', consultar='$lo4' WHERE user = '$id'";
		$result_m_local = mysqli_query($conexao_perm, $query_m_local);
		if(!$result_m_local){
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
	if(isset($_POST['lo1'])){

		$lo1 = $_POST['lo1'];
	}else{
		$lo1=0;
	}

	if(isset($_POST['lo2'])){
		
		$lo2 = $_POST['lo2'];
	}else{
		$lo2 = 0;
	}

	if(isset($_POST['lo3'])){
		$lo3 = $_POST['lo3'];
	}else{
		$lo3 = 0;
	}

	if(isset($_POST['lo4'])){
		
		$lo4 = $_POST['lo4'];
	}else{
		$lo4 = 0;
	}
	
	

		$query_m_local = "INSERT INTO m_local(user, criar, alterar, excluir, consultar) VALUES ('$user', '$lo1', '$lo2', '$lo3', '$lo4')";
		$result_m_local = mysqli_query($conexao_perm, $query_m_local);
		if(!$result_m_local){
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
