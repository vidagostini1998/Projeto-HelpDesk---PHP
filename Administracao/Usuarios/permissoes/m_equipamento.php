<?php
if(isset($_POST['id'])){
	if(isset($_POST['eq1'])){

		$eq1 = $_POST['eq1'];
	}else{
		$eq1=0;
	}

	if(isset($_POST['eq2'])){
		
		$eq2 = $_POST['eq2'];
	}else{
		$eq2 = 0;
	}

	if(isset($_POST['eq3'])){
		$eq3 = $_POST['eq3'];
	}else{
		$eq3 = 0;
	}

	if(isset($_POST['eq4'])){
		
		$eq4 = $_POST['eq4'];
	}else{
		$eq4 = 0;
	}
	
	

		$query_m_equip = "UPDATE m_equipamento SET criar='$eq1', alterar='$eq2', excluir = '$eq3', consultar='$eq4' WHERE user = '$id'";
		$result_m_equip = mysqli_query($conexao_perm, $query_m_equip);
		if(!$result_m_equip){
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
	if(isset($_POST['eq1'])){

		$eq1 = $_POST['eq1'];
	}else{
		$eq1=0;
	}

	if(isset($_POST['eq2'])){
		
		$eq2 = $_POST['eq2'];
	}else{
		$eq2 = 0;
	}

	if(isset($_POST['eq3'])){
		$eq3 = $_POST['eq3'];
	}else{
		$eq3 = 0;
	}

	if(isset($_POST['eq4'])){
		
		$eq4 = $_POST['eq4'];
	}else{
		$eq4 = 0;
	}
	
	

		$query_m_equip = "INSERT INTO m_equipamento(user, criar, alterar, excluir, consultar) VALUES ('$user', '$eq1', '$eq2', '$eq3', '$eq4')";
		$result_m_equip = mysqli_query($conexao_perm, $query_m_equip);
		if(!$result_m_equip){
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
