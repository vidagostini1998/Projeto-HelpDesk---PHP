<?php

if(isset($_POST['id'])){
	if(isset($_POST['ca1'])){

		$ca1 = $_POST['ca1'];
	}else{
		$ca1=0;
	}

	if(isset($_POST['ca2'])){
		
		$ca2 = $_POST['ca2'];
	}else{
		$ca2 = 0;
	}

	if(isset($_POST['ca3'])){
		$ca3 = $_POST['ca3'];
	}else{
		$ca3 = 0;
	}

	if(isset($_POST['ca4'])){
		
		$ca4 = $_POST['ca4'];
	}else{
		$ca4 = 0;
	}
	
	

		$query_m_cate = "UPDATE m_categoria SET criar='$ca1', alterar='$ca2', excluir = '$ca3', consultar='$ca4' WHERE user = '$id'";
		$result_m_cate = mysqli_query($conexao_perm, $query_m_cate);
		if(!$result_m_cate){
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
	if(isset($_POST['ca1'])){

		$ca1 = $_POST['ca1'];
	}else{
		$ca1=0;
	}

	if(isset($_POST['ca2'])){
		
		$ca2 = $_POST['ca2'];
	}else{
		$ca2 = 0;
	}

	if(isset($_POST['ca3'])){
		$ca3 = $_POST['ca3'];
	}else{
		$ca3 = 0;
	}

	if(isset($_POST['ca4'])){
		
		$ca4 = $_POST['ca4'];
	}else{
		$ca4 = 0;
	}
	
	

		$query_m_cate = "INSERT INTO m_categoria(user, criar, alterar, excluir, consultar) VALUES ('$user', '$ca1', '$ca2', '$ca3', '$ca4')";
		$result_m_cate = mysqli_query($conexao_perm, $query_m_cate);
		if(!$result_m_cate){
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

