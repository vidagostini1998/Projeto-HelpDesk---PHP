<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: ../../index.php");
  exit;
}
include('header/header.php');
?>
<br>
<div class="container-fluid border-bottom border-info  rounded-bottom">
  <div class="row">
    <div class="col">
      <h2>Bem Vindo!</h2>
      <h5>Olá, <?php echo $_SESSION['UsuarioNome']; ?>! </h5>
    </div>
    <div class="col">
      <br>
      <br>
      <h6>Sistema integrado para chamados e solicitações. Este sistema serve para testes e mostruario. Entre em contato conosco pelo site <a href="https://vhdwebsites.com.br">VHD WebSites</a> para saber mais! </h6>
    </div>
  </div>
</div>

<div class="container-fluid" style="margin-top:30px;">
  <?php
    include('./HelpDesk/table/tableadm.php');
  ?>
</div>
<?php
include('footer.php');
?>
</body>

</html>