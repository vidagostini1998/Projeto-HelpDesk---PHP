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
    <h2 class="text-center">Cadastro de Produto</h2>
</div>
<div class="px-3 py-2 mb-3">
    <div class="text-end log">
        <a href="?page=produto" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<div class="container-fluid border-top border-bottom border-1 border-primary borda">
    <form class="row g-3" action="./HelpDesk/adm/estoque/produto/pro_adc_produto.php" method="POST">
        <input type="hidden" name="id_adc" id="id_adc" value="<?php echo $_SESSION['UsuarioID'];?> ">
        <div class="col-md-2">
            <label for="data" class="form-label">Data</label>
            <input type="date" readonly name="data" class="form-control text-center" id="data"
                value="<?php echo date("Y-m-d");?>" required>
        </div>
        <div class="col-md-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Nome do Produto" id="nome" required>
        </div>
        <div class="col-md-2">
            <label for="codigo" class="form-label">Codigo</label>
            <input type="text" name="codigo" class="form-control" id="codigo" placeholder="X">

        </div>

        <!--<div class="col-md-2">
            <label class="form-label" for="valor">Valor Unitario</label>
            <div class="input-group">
                <span class="input-group-text" id="addon-wrapping">R$</span>
                <input name="valor" id="valor" type="number" min="1" step="0.01" class="form-control" placeholder="0,00"
                    aria-label="valor Unitario" aria-describedby="addon-wrapping">
            </div>
        </div>-->

        <div class="col-md-2">
            <label for="categoria" class="form-label">Categoria</label>
            <select class="form-select" name="categoria" id="categoria">
                <option value="">Selecione</option>
                <?php
                    while($linha = mysqli_fetch_array($consulta_categoria_insu)){
                        echo '<option value="'.$linha['id_insu'].'">'.$linha['nome_cate_insu'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="fornecedor" class="form-label">Fornecedor</label>
            <select required name="fornecedor" class="form-select" id="fornecedor">
                <option value="">Selecione</option>
                <?php
                    while($linha = mysqli_fetch_array($consulta_fornecedor)){
                        echo '<option value="'.$linha['id_fornecedor'].'">'.$linha['nome_fornecedor'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" id="marca" placeholder="Marca do produto">
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
        <div class="col-md-2">
            <label for="status" class="form-label">Status</label>
            <select required name="status" class="form-select" id="status">
                <option value="">Selecione</option>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="obs" class="form-label">OBS</label>
            <textarea name="obs" class="form-control" id="obs" rows="3"></textarea>
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