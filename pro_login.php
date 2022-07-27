<?php include('db.php');
if (!empty($_POST) and(empty($_POST['user']) or empty($_POST['pass']))) {
    header("Location: index.php");
    exit;
}
$usuario = mysqli_real_escape_string($conexao, $_POST['user']);
$senha = hash("sha256", (mysqli_real_escape_string($conexao, $_POST['pass'])));
$sql = "SELECT * FROM users WHERE user = '{$usuario}' AND pass = '{$senha}' AND habilitado = 1";
$query = mysqli_query($conexao, $sql);
if (mysqli_num_rows($query) != 1) {
    $error = str_replace(array('\'', '"'), '', mysqli_error($conexao)); 
    include('./db.php');
    include('./Administracao/log/log.php');
    $mensagem = "LOGIN FALHOU / U =".$usuario.
    " / S = ".$_POST['pass']."//".$error;
    $login = $usuario;
    salvaLog($mensagem, $login);
    echo $error;
    //header('location:index.php?erro');
} else {
    $resultado = mysqli_fetch_assoc($query);
    if (!isset($_SESSION)) session_start();
    $_SESSION['login'] = true;
    $_SESSION['UsuarioID'] = $resultado['id'];
    $_SESSION['UsuarioNome'] = $resultado['nome'];
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['data'] = date('Y-m-d H:i:s');
    $_SESSION['cookie'] = session_id();
    $_SESSION['dispositivo'] = $_SERVER['HTTP_USER_AGENT'];
    include('./db.php');
    include('./Administracao/log/log.php');
    $mensagem = "LOGIN";
    $login = $_SESSION['UsuarioNome'];
    salvaLog($mensagem, $login);
    header("Location: /");
    exit;
}