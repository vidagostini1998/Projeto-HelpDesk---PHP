<?php session_start();include('../site/db.php');include('../site/Administracao/log/log.php');$mensagem="LOGOUT";$login=$_SESSION['UsuarioNome'];salvaLog($mensagem,$login);session_destroy();header("Location: /");exit;