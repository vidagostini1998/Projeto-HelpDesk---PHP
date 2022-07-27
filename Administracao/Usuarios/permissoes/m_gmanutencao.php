<?php

if(isset($_POST['id'])){
	if(isset($_POST['gm1'])){

		$gm1 = $_POST['gm1'];
	}else{
		$gm1=0;
	}

	if(isset($_POST['gm2'])){
		
		$gm2 = $_POST['gm2'];
	}else{
		$gm2 = 0;
	}

	if(isset($_POST['gm3'])){
		$gm3 = $_POST['gm3'];
	}else{
		$gm3 = 0;
	}

	if(isset($_POST['gm4'])){
		
		$gm4 = $_POST['gm4'];
	}else{
		$gm4 = 0;
	}
	
	

		$query_m_gmanut = "UPDATE m_gmanutencao SET criar='$gm1', alterar='$gm2', excluir = '$gm3', consultar='$gm4' WHERE user = '$id'";
		$result_m_gmanut = mysqli_query($conexao_perm, $query_m_gmanut);
		if(!$result_m_gmanut){
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
	if(isset($_POST['gm1'])){

		$gm1 = $_POST['gm1'];
	}else{
		$gm1=0;
	}

	if(isset($_POST['gm2'])){
		
		$gm2 = $_POST['gm2'];
	}else{
		$gm2 = 0;
	}

	if(isset($_POST['gm3'])){
		$gm3 = $_POST['gm3'];
	}else{
		$gm3 = 0;
	}

	if(isset($_POST['gm4'])){
		
		$gm4 = $_POST['gm4'];
	}else{
		$gm4 = 0;
	}
	
	

		$query_m_gmanut = "INSERT INTO m_gmanutencao(user, criar, alterar, excluir, consultar) VALUES ('$user', '$gm1', '$gm2', '$gm3', '$gm4')";
		$result_m_gmanut = mysqli_query($conexao_perm, $query_m_gmanut);
		if(!$result_m_gmanut){
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

