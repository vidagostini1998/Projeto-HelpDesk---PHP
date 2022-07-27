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
    <h2 class="text-center">Alterar Saida</h2>
</div>
<div class="px-3 py-2 mb-3">
    <div class="text-end log">
        <a href="?page=movimentacao" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<div class="container-fluid border-top border-bottom border-1 border-primary borda">
<?php
        while($linha=mysqli_fetch_array($consulta_saida)){ 
        if($linha['id_saida']==$_GET['id']){
        ?>
    <form class="row g-3" action="./HelpDesk/adm/estoque/movimentacao/pro_alter_saida.php" method="POST">
        <input type="hidden" name="id_adc" id="id_adc" value="<?php echo $linha['id_adc'];?> ">
        <input type="hidden" name="id" id="id" value="<?php echo $linha['id_saida']; ?>">
        <div class="col-md-2">
            <label for="data" class="form-label">Data</label>
            <input type="date"  name="data" class="form-control text-center" id="data"
                value="<?php echo $linha['data_saida'];?>" required>
        </div>
        <div class="col-md-3">
            <label for="produto" class="form-label">Produto</label>
            <select required class="form-select" name="produto" id="produto">
                <option value="">Selecione</option>
                <?php
                    while($linha1 = mysqli_fetch_array($consulta_produtos)){
                        if($linha1['id_produto'] == $linha['produto']){
                            echo '<option selected value="'.$linha1['id_produto'].'">'.$linha1['nome_produto'].'</option>';
                        }else{
                            echo '<option value="'.$linha1['id_produto'].'">'.$linha1['nome_produto'].'</option>';
                        }
                        
                    }
                ?>
            </select>
        </div>
        <div class="col-md-1">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input required type="number" min="0" step="1" name="quantidade" class="form-control" id="quantidade"
                placeholder="0" value="<?php echo $linha['quantidade'] ?>" >

        </div>
        <div class="col-md-2">
            <label for="local" class="form-label">Local</label>
            <select required name="local" class="form-select" id="local">
                <option value="">Selecione</option>
                <?php
                    while($linha2 = mysqli_fetch_array($consulta_local)){
                        if($linha2['id_local'] == $linha['local']){
                            echo '<option selected value="'.$linha2['id_local'].'">'.$linha2['nome_local'].'</option>';
                        }else{
                            echo '<option value="'.$linha2['id_local'].'">'.$linha2['nome_local'].'</option>';
                        }
                        
                    }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="filial" class="form-label">Filial</label>
            <select required name="filial" class="form-select" id="filial">
                <option value="">Selecione</option>
                <?php
                    while($linha3 = mysqli_fetch_array($consulta_filial)){
                        if($linha3['id_filial'] == $linha['filial']){
                            echo '<option selected value="'.$linha3['id_filial'].'">'.$linha3['nome_filial'].'</option>';
                        }else{
                            echo '<option value="'.$linha3['id_filial'].'">'.$linha3['nome_filial'].'</option>';
                        }
                        
                    }
                ?>
            </select>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success"><i class="far fa-check-circle fa-2x"></i></button>
            <a href="?page=exclui_saida&id=<?php echo $linha['id_saida'] ?>" class="btn btn-danger"><i class="fas fa-minus-circle fa-2x"></i></a>
        </div>
    </form>
    <?php   }
        }
    ?>

</div>
<?php
    include('./HelpDesk/footer.php');
?>
</body>

</html>