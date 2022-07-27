<?php


include('../../db.php');


$q = $_GET['q'];

$query_patri = "SELECT P.nome, P.marca, P.modelo, P.obs_patrimonio, L.nome_local, P.categoria, C.nome_cate, P.ref, P.filial, F.nome_filial, P.local_patrimonio FROM patrimonio P JOIN local L on P.local_patrimonio = L.id_local JOIN categoria_equi C ON P.categoria = C.id_cate JOIN filial F ON P.filial = F.id_filial WHERE P.id_patrimonio = '{$q}'";

$consulta_patri = mysqli_query($conexao,$query_patri);


    $linha1 = mysqli_fetch_array($consulta_patri);
        echo "<h5> Patrimonio </h5>";
        echo "<table class='table text-center' id='table2'>";
        
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nome</th>";
        echo "<th>Marca</th>";
        echo "<th>Modelo</th>";
        echo "<th>Categoria</th>";
        echo "<th>Referencia</th>";
        echo "<th>Local</th>";
        echo "<th>Filial</th>";
        echo "<th>OBS</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody >";
        echo "<td>" . $linha1['nome'] . " </td>";
        echo "<td>" . $linha1['marca'] . "</td>";
        echo "<td>" . $linha1['modelo'] . "</td>";
        echo "<td>" . $linha1['nome_cate'] . " <input id='categoria' type='hidden' value='".$linha1['categoria']."' name='categoria'></input></td>";
        echo "<td>" . $linha1['ref'] . "</td>";
        echo "<td>" . $linha1['nome_local'] . "<input id='local'value='".$linha1['local_patrimonio']."' type='hidden' name='local'></input></td>";
        echo "<td>" . $linha1['nome_filial'] . " <input id='filial' type='hidden' value='".$linha1['filial']."' name='filial'></input></td>";
        echo "<td>" . $linha1['obs_patrimonio'] . "</td>";
        echo "</tbody>";
        echo "</table>";
?>