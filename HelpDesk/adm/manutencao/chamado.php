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

include('../../../db.php');


$q1 = $_GET['q1'];

if($q1 == 0){

}else{
    $query_patri = "SELECT CH.*, P.patrimonio FROM chamados_patrimonio CH JOIN patrimonio P ON CH.patrimonio = P.id_patrimonio WHERE CH.id = '{$q1}'";

    $consulta_patri = mysqli_query($conexao,$query_patri);
    
    
        $linha1 = mysqli_fetch_array($consulta_patri);
            echo "<h5> Chamado </h5>";
            echo "<table class='table text-center' id=''>";
            
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Data</th>";
            echo "<th>Problema</th>";
            echo "<th>OBS</th>";
            echo "<th>Patrimonio</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody >";
            echo "<td>" . $linha1['id'] . " </td>";
            echo "<td>" . $linha1['data_chamado'] . "</td>";
            echo "<td>" . $linha1['problema'] . "</td>";
            echo "<td>" . $linha1['obs'] . "</td>";
            echo "<td>" . $linha1['patrimonio'] . "</td>";
            
            
            echo "</tbody>";
            echo "</table>";
}


?>