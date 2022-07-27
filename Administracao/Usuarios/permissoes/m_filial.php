<?php
if(isset($_POST['id'])){
	if(isset($_POST['fi1'])){

		$fi1 = $_POST['fi1'];
	}else{
		$fi1=0;
	}

	if(isset($_POST['fi2'])){
		
		$fi2 = $_POST['fi2'];
	}else{
		$fi2 = 0;
	}

	if(isset($_POST['fi3'])){
		$fi3 = $_POST['fi3'];
	}else{
		$fi3 = 0;
	}

	if(isset($_POST['fi4'])){
		
		$fi4 = $_POST['fi4'];
	}else{
		$fi4 = 0;
	}
	
	

		$query_m_filial = "UPDATE m_filial SET criar='$fi1', alterar='$fi2', excluir = '$fi3', consultar='$fi4' WHERE user = '$id'";
		$result_m_filial = mysqli_query($conexao_perm, $query_m_filial);
		if(!$result_m_filial){
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
	if(isset($_POST['fi1'])){

		$fi1 = $_POST['fi1'];
	}else{
		$fi1=0;
	}

	if(isset($_POST['fi2'])){
		
		$fi2 = $_POST['fi2'];
	}else{
		$fi2 = 0;
	}

	if(isset($_POST['fi3'])){
		$fi3 = $_POST['fi3'];
	}else{
		$fi3 = 0;
	}

	if(isset($_POST['fi4'])){
		
		$fi4 = $_POST['fi4'];
	}else{
		$fi4 = 0;
	}
	
	

		$query_m_filial = "INSERT INTO m_filial(user, criar, alterar, excluir, consultar) VALUES ('$user', '$fi1', '$fi2', '$fi3', '$fi4')";
		$result_m_filial = mysqli_query($conexao_perm, $query_m_filial);
		if(!$result_m_filial){
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
