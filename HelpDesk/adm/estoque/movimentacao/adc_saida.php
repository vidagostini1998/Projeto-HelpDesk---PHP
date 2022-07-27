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
    <h2 class="text-center">Adicionar Saida</h2>
</div>
<div class="px-3 py-2 mb-3">
    <div class="text-end log">
        <a href="?page=movimentacao" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<div class="container-fluid border-top border-bottom border-1 border-primary borda">
    <form class="row g-3" action="./HelpDesk/adm/estoque/movimentacao/pro_adc_saida.php" method="POST">
        <input type="hidden" name="id_adc" id="id_adc" value="<?php echo $_SESSION['UsuarioID'];?> ">
        <div class="col-md-2">
            <label for="data" class="form-label">Data</label>
            <input type="date" readonly name="data" class="form-control text-center" id="data"
                value="<?php echo date("Y-m-d");?>" required>
        </div>
        <div class="col-md-3">
            <label for="produto" class="form-label">Produto</label>
            <select required class="form-select" name="produto" id="produto">
                <option value="">Selecione</option>
                <?php
                    while($linha = mysqli_fetch_array($consulta_produtos)){
                        echo '<option value="'.$linha['id_produto'].'">'.$linha['nome_produto'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-md-1">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input required type="number" min="0" step="1" name="quantidade" class="form-control" id="quantidade"
                placeholder="0" >

        </div>
        <div class="col-md-2">
            <label for="local" class="form-label">Local</label>
            <select required name="local" class="form-select" id="local">
                <option value="">Selecione</option>
                <?php
                    while($linha = mysqli_fetch_array($consulta_local)){
                        echo '<option value="'.$linha['id_local'].'">'.$linha['nome_local'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="filial" class="form-label">Filial</label>
            <select required name="filial" class="form-select" id="filial">
                <option value="">Selecione</option>
                <?php
                    while($linha = mysqli_fetch_array($consulta_filial)){
                        echo '<option value="'.$linha['id_filial'].'">'.$linha['nome_filial'].'</option>';
                    }
                ?>
            </select>
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