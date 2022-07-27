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
      
        ?>

<button type="button" class="btn btn-primary" onclick="table_equi(<?php echo $_SESSION['UsuarioID']; ?>)">Equipamentos</button>
<button type="button" class="btn btn-success" onclick="table_insu(<?php echo $_SESSION['UsuarioID']; ?>)">Insumos</button>
<br><br>
<div id="tabela"></div>