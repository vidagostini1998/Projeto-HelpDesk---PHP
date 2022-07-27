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
<script>
    function excluir() {
        var resultado = confirm("Você realmente deseja desabilitar o produto?");
        if (resultado == true) {
            document.getElementById("form1").submit();

        } else {
            window.location.href = "?page=produto";
        }
    }
</script>


<br>
<div class="border-bottom">
    <h2 class="text-center">Desabilita Produto</h2>
</div>
<div class="px-3 py-2 mb-3">
    <div class="text-end log">
        <a href="?page=produto" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<div class="container-fluid border-top border-bottom border-1 border-primary borda">

    <?php
        while($linha=mysqli_fetch_array($consulta_produtos)){ 
        if($linha['id_produto']==$_GET['id']){
        ?>
    <form id="form1" class="row g-3" action="./HelpDesk/adm/estoque/produto/pro_des_produto.php" method="POST">
        <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'];?>">
        <input type="hidden" name="id_adc" id="id_adc" value="<?php echo $linha['id_adc'];?> ">
        <div class="col-md-2">
            <label for="data" class="form-label">Data</label>
            <input disabled type="date" readonly name="data" class="form-control text-center" id="data"
                value="<?php echo $linha['data_adc'];?>" required>
        </div>
        <div class="col-md-3">
            <label for="nome" class="form-label">Nome</label>
            <input disabled type="text" name="nome" class="form-control" placeholder="Nome do Produto" id="nome"
                value="<?php echo $linha['nome_produto'];?>" required>
        </div>
        <div class="col-md-2">
            <label for="codigo" class="form-label">Codigo</label>
            <input disabled type="text" value="<?php echo $linha['codigo_produto'];?>" name="codigo"
                class="form-control" id="codigo" placeholder="X">

        </div>

        <!--<div class="col-md-2">
            <label class="form-label" for="valor">Valor Unitario</label>
            <div class="input-group">
                <span class="input-group-text" id="addon-wrapping">R$</span>
                <input disabled name="valor" id="valor" value="<?php echo $linha['valor_unitario'];?>" type="number"
                    min="1" step="0.01" class="form-control" placeholder="0,00" aria-label="valor Unitario"
                    aria-describedby="addon-wrapping">
            </div>
        </div>-->

        <div class="col-md-2">
            <label for="categoria" class="form-label">Categoria</label>
            <select disabled class="form-select" name="categoria" id="categoria">
                <option value="">Selecione</option>
                <?php
                    while($linha1 = mysqli_fetch_array($consulta_categoria_insu)){
                        if($linha1['id_insu'] == $linha['categoria'] ){$select = "selected";}else{$select="";};
                        echo '<option '.$select.' value="'.$linha1['id_insu'].'">'.$linha1['nome_cate_insu'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="fornecedor" class="form-label">Fornecedor</label>
            <select disabled required name="fornecedor" class="form-select" id="fornecedor">
                <option value="">Selecione</option>
                <?php
                    while($linha2 = mysqli_fetch_array($consulta_fornecedor)){
                        if($linha2['id_fornecedor'] == $linha['fornecedor'] ){$select = "selected";}else{$select="";};
                        echo '<option '.$select.' value="'.$linha2['id_fornecedor'].'">'.$linha2['nome_fornecedor'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="marca" class="form-label">Marca</label>
            <input disabled type="text" value="<?php echo $linha['marca'];?>" name="marca" class="form-control"
                id="marca" placeholder="Marca do produto">
        </div>
        <div class="col-md-2">
            <label for="local" class="form-label">Local</label>
            <select disabled required name="local" class="form-select" id="local">
                <option value="">Selecione</option>
                <?php
                    while($linha3 = mysqli_fetch_array($consulta_local)){
                        if($linha3['id_local'] == $linha['local']){$select="selected";}else{$select="";}
                        echo '<option '.$select.' value="'.$linha3['id_local'].'">'.$linha3['nome_local'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="filial" class="form-label">Filial</label>
            <select disabled required name="filial" class="form-select" id="filial">
                <option value="">Selecione</option>
                <?php
                    while($linha4 = mysqli_fetch_array($consulta_filial)){
                        if($linha4['id_filial'] == $linha['filial']){$select="selected";}else{$select="";}
                        echo '<option '.$select.' value="'.$linha4['id_filial'].'">'.$linha4['nome_filial'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="status" class="form-label">Status</label>
            <select disabled required name="status" class="form-select" id="status">
                <option value="">Selecione</option>
                <option <?php if($linha['status'] == 1){echo "selected";}else{} ?> value="1">Ativo</option>
                <option <?php if($linha['status'] == 0){echo "selected";}else{} ?> value="2">Inativo</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="obs" class="form-label">OBS</label>
            <textarea disabled name="obs" class="form-control" id="obs" rows="3"><?php echo $linha['obs'];?></textarea>
        </div>


    </form>
    <br>
    <div class="col-md-12">
        <button onclick="excluir()" class="btn btn-danger"><i class="fas fa-minus-circle fa-2x"></i></button>

    </div>
    <?php   }
        }
    ?>
</div>
<?php
    include('./HelpDesk/footer.php');
?>
</body>

</html>