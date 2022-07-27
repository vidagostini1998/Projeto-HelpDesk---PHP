<?php

if(isset($_POST['id'])){
	if(isset($_POST['ch1'])){

		$ch1 = $_POST['ch1'];
	}else{
		$ch1=0;
	}

	if(isset($_POST['ch2'])){
		
		$ch2 = $_POST['ch2'];
	}else{
		$ch2 = 0;
	}

	if(isset($_POST['ch3'])){
		$ch3 = $_POST['ch3'];
	}else{
		$ch3 = 0;
	}

	if(isset($_POST['ch4'])){
		
		$ch4 = $_POST['ch4'];
	}else{
		$ch4 = 0;
	}
	
	

		$query_m_chamado = "UPDATE m_chamado SET criar='$ch1', alterar='$ch2', excluir = '$ch3', consultar='$ch4' WHERE user = '$id'";
		$result_m_chamado = mysqli_query($conexao_perm, $query_m_chamado);
		if(!$result_m_chamado){
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
	if(isset($_POST['ch1'])){

		$ch1 = $_POST['ch1'];
	}else{
		$ch1=0;
	}

	if(isset($_POST['ch2'])){
		
		$ch2 = $_POST['ch2'];
	}else{
		$ch2 = 0;
	}

	if(isset($_POST['ch3'])){
		$ch3 = $_POST['ch3'];
	}else{
		$ch3 = 0;
	}

	if(isset($_POST['ch4'])){
		
		$ch4 = $_POST['ch4'];
	}else{
		$ch4 = 0;
	}
	
	

		$query_m_chamado = "INSERT INTO m_chamado(user, criar, alterar, excluir, consultar) VALUES ('$user', '$ch1', '$ch2', '$ch3', '$ch4')";
		$result_m_chamado = mysqli_query($conexao_perm, $query_m_chamado);
		if(!$result_m_chamado){
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


