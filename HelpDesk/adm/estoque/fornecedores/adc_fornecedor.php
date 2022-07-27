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
        include('./HelpDesk/header/header3.php');
        include('./db.php');
        ?>

<br>
<div class="border-bottom">
    <h2 class="text-center">Adicionar Fornecedor</h2>
</div>
<div class="px-3 py-2 mb-3">
    <div class="text-end log">
        <a href="?page=fornecedores" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<div class="container-fluid border-top border-bottom border-1 border-primary borda">
    <form class="row g-3" action="./HelpDesk/adm/estoque/fornecedores/pro_adc_fornecedor.php" method="POST">
        <input type="hidden" name="id_adc" id="id_adc" value="<?php echo $_SESSION['UsuarioID'];?> ">
        <div class="col-md-2">
            <label for="data" class="form-label">Data</label>
            <input type="date" readonly name="data" class="form-control text-center" id="data"
                value="<?php echo date("Y-m-d");?>" required>
        </div>
        <div class="col-md-3">
            <label for="nome" class="form-label">Nome Fornecedor</label>
            <input type="text" class="form-control" required name="nome" id="nome">
        </div>
        <div class="col-md-2">
            <label for="cnpj_cpf" class="form-label">CNPJ/CPF</label>
            <input  type="text" name="cnpj_cpf" class="form-control" id="cnpj_cpf">

        </div>

        <div class="col-md-4">
            <label class="form-label" for="endereco">Endereço</label>
            <input  type="text" name="endereco" class="form-control" id="endereco">
        </div>

        <div class="col-md-2">
            <label class="form-label" for="telefone">Telefone</label>
            <input type="tel" name="tel" id="telefone" class="form-control">
        </div>
        <div class="col-md-2">
            <label class="form-label" for="celular">Celular</label>
            <input type="cel" name="cel" id="celular" class="form-control">
        </div>
        <div class="col-md-7">
        <label for="obs" class="form-label">OBS</label>
        <textarea name="obs" id="obs"  rows="3" class="form-control"></textarea>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success"><i class="far fa-check-circle fa-2x"></i></button>
        </div>
    </form>

</div>
<?php
    include('./HelpDesk/footer.php');
?>
</body>

</html>