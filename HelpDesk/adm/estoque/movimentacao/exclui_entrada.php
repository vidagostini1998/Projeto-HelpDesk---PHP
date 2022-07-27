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
        var resultado = confirm("Você realmente deseja excluir a entrada?");
        if (resultado == true) {
            document.getElementById("form1").submit();

        } else {
            window.location.href = "?page=movimentacao";
        }
    }
</script>

<br>
<div class="border-bottom">
    <h2 class="text-center">Alterar Entrada</h2>
</div>
<div class="px-3 py-2 mb-3">
    <div class="text-end log">
        <a href="?page=movimentacao" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<div class="container-fluid border-top border-bottom border-1 border-primary borda">
<?php
        while($linha=mysqli_fetch_array($consulta_entrada)){ 
        if($linha['id_entrada']==$_GET['id']){
        ?>
    <form class="row g-3" id="form1" action="./HelpDesk/adm/estoque/movimentacao/pro_delete_entrada.php" method="POST">
    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'];?>">
        <input type="hidden" name="id_adc" id="id_adc" value="<?php echo $linha['id_adc'];?> ">
        <input type="hidden" name="produto" id="produto" value="<?php echo $linha['produto']?>">;
        <div class="col-md-2">
            <label for="data" class="form-label">Data</label>
            <input disabled type="date" name="data" class="form-control text-center" id="data"
                value="<?php echo $linha['data_entrada'];?>" required>
        </div>
        <div class="col-md-3">
            <label for="produto" class="form-label">Produto</label>
            <select disabled required class="form-select" name="produto" id="produto">
                <option value="">Selecione</option>
                <?php
                    while($linha1 = mysqli_fetch_array($consulta_produtos)){
                        
                        if($linha1['id_produto']==$linha['produto'])
                        {
                            $select = "selected";
                            
                        }
                        else
                        {
                            $select="";
                        }

                        echo '<option '.$select.' value="'.$linha1['id_produto'].'">'.$linha1['nome_produto'].'</option>';
                        
                    }
                ?>
            </select>
        </div>
        <div class="col-md-1">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input disabled required type="number" min="0" step="1" name="quantidade" class="form-control" id="quantidade"
                placeholder="0" value="<?php echo $linha['quantidade']?>" onblur="calcula()">

        </div>

        <div class="col-md-2">
            <label class="form-label" for="valor">Valor Unitario</label>
            <div class="input-group">
                <span class="input-group-text" id="addon-wrapping">R$</span>
                <input disabled required name="valor" id="valor" type="number" min="1" step="0.01" class="form-control"
                    placeholder="0,00"  aria-label="valor Unitario" aria-describedby="addon-wrapping" onblur="calcula()" value="<?php echo $linha['valor_unitario']?>">
            </div>
        </div>



        <div class="col-md-2">

            <label class="form-label" for="valor_total">Valor Total</label>
            <div class="input-group">
                <span class="input-group-text" id="addon-wrapping">R$</span>
                <input disabled required readonly name="total" id="total" type="number" class="form-control" placeholder="0,00"
                    aria-label="valor total" aria-describedby="addon-wrapping" value="<?php echo $linha['valor_total']?>">
            </div>
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