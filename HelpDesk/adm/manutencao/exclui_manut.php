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
        include('./Administracao/Usuarios/permissoes/db_perm.php');
        while($linha1=mysqli_fetch_array($consulta_m_gmanutencao)){
            if($_SESSION['UsuarioID'] == $linha1['user']){
                if($linha1['excluir'] == 1){   
                }else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=consulta_manutencao';</script>";
                }
            }
        }
        include('./HelpDesk/header/header3.php');
        include('./db.php');
        ?>
<script>
    function excluir() {
        var resultado = confirm("Você realmente deseja excluir a manutenção?");
        if (resultado == true) {
            document.getElementById("form1").submit();

        } else {
            window.location.href = "?page=consulta_manutencao";
        }
    }
</script>
<br>
<div class="border-bottom">
    <h2 class="text-center">Excluir Manutenção</h2>
</div>
<div class="px-3 py-2 mb-3">
    <div class="text-end log">
        <a href="javascript:history.back()" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<div class="container-fluid border-top border-bottom border-1 border-primary borda">
    <?php
    while($linha=mysqli_fetch_array($consulta_manut)){ 
    if($linha['id_manut']==$_GET['id']){
?>
    <form class="row g-3" id="form1" action="./HelpDesk/adm/manutencao/pro_delet_manut.php" method="POST">
        <div class="col-md-2">
            <input type="hidden"  name="id_manut" value="<?php echo $_GET['id']; ?>">
            <label for="data_manu" class="form-label">Data Manutenção</label>
            <input readonly type="date" name="data_manut" class="form-control" id="data_manut"
                value="<?php echo $linha['data_manut']; ?>">
        </div>
        <div class="col-md-2">
            <label for="data_realizado" class="form-label">Data Realizado</label>
            <input readonly type="date" name="data_realizado" class="form-control" id="data_realizado"
                value="<?php echo $linha['data_realizada']; ?>">

        </div>

        <div class="col-md-3">
            <label for="solicitante" class="form-label"> Solicitante </label>
            <input readonly type="text" id="solicitante" name="solicitante" class="form-control"
                value="<?php echo $linha['solicitante']; ?>" required>
        </div>


        <div class="col-md-2">
            <label for="tipo" class="form-label">Tipo de Manutenção</label>
            <select disabled required name="tipo" class="form-select" id="tipo">
                <?php
                $select = "";
                $select1 = "";
                    if($linha['tipo'] == 1){
                        $select = "selected";
                    }else if($linha['tipo'] == 2){
                        $select1 = "selected";
                    }
                ?>
                <option value="">Selecione</option>
                <option <?php echo $select;?> value="1">Corretiva</option>
                <option <?php echo $select1;?> value="2">Preventiva</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="prestador" class="form-label">Prestador</label>
            <select disabled name="prestador" class="form-select" id="prestador">
                <option selected value="">Selecione</option>
                <?php 
                    while($linha1 = mysqli_fetch_array($consulta_prestador)){
                        if($linha['prestador'] == $linha1['id_prestador']){

                            echo '<option selected value="'.$linha1['id_prestador'].'">'.$linha1['nome_prestador'].'</option>';
                        }else{
                            echo '<option value="'.$linha1['id_prestador'].'">'.$linha1['nome_prestador'].'</option>';
                        }
                    }
                  ?>
            </select>
        </div>

        <div class="col-md-4">
            <label for="motivo" class="form-label">Motivo</label>
            <textarea readonly name="motivo" required class="form-control" id="motivo"
                rows="3"><?php echo $linha['motivo']; ?></textarea>
        </div>
        <div class="col-md-4">
            <label for="problema" class="form-label">Problema</label>
            <textarea readonly name="problema" required class="form-control" id="problema"
                rows="3"><?php echo $linha['problema']; ?></textarea>
        </div>
        <div class="col-md-4">
            <label for="solucao" class="form-label">Solução</label>
            <textarea readonly name="solucao" class="form-control" id="solucao"
                rows="3"><?php echo $linha['solucao']; ?></textarea>
        </div>
        <div class="col-md-4">
            <label for="obs" class="form-label">OBS</label>
            <textarea readonly name="obs" class="form-control" id="obs" rows="2"><?php echo $linha['obs']; ?></textarea>
        </div>
        <div class="col-md-2">
            <label for="patrimonio" class="form-label">Patrimonio</label>
            <select disabled onchange="showCustomer(this.value)" name="patrimonio" required class="form-select"
                id="patrimonio">
                <option selected value="">Selecione</option>
                <?php 
                    while($linha1 = mysqli_fetch_array($consulta_patrimonio)){
                        if($linha1['id_patrimonio'] == 0){

                        }else{
                            if($linha['patrimonio'] == $linha1['id_patrimonio']){
                                echo '<option selected value="'.$linha1['id_patrimonio'].'">'.$linha1['patrimonio'].'</option>';
                            }
                            else{
                                echo '<option value="'.$linha1['id_patrimonio'].'">'.$linha1['patrimonio'].'</option>';
                            }
                            
                        }
                        
                            
                    }
                  ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="local" class="form-label">Local</label>
            <select disabled name="local" required class="form-select" id="local">
                <option selected value="">Selecione</option>
                <?php 
                    while($linha1 = mysqli_fetch_array($consulta_local)){
                        
                        if($linha1['id_local'] == 44){

                        }else{
                            if($linha['local'] == $linha1['id_local']){
                                echo '<option selected value="'.$linha1['id_local'].'">'.$linha1['nome_local'].'</option>';
                            }else{
                                echo '<option value="'.$linha1['id_local'].'">'.$linha1['nome_local'].'</option>';
                            }
                        }

                        
                    }
                  ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="filial" class="form-label">Filial</label>
            <select disabled name="filial" required class="form-select" id="filial">
                <option selected value="">Selecione</option>
                <?php 
                    while($linha1 = mysqli_fetch_array($consulta_filial)){

                        if($linha1['id_filial'] == 6){

                        }else{
                            if($linha['filial'] == $linha1['id_filial']){
                                echo '<option selected value="'.$linha1['id_filial'].'">'.$linha1['nome_filial'].'</option>';
                            }else{
                                echo '<option value="'.$linha1['id_filial'].'">'.$linha1['nome_filial'].'</option>';
                            }
                        }
                        
                    }
                  ?>
            </select>
        </div>

        <div class="col-md-2">
            <label for="chamado" class="form-label">Chamado <a href="" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <strong>?</strong>
                </a></label>
            <select disabled onchange="showCustomer1(this.value)" name="chamado" class="form-select" id="chamado">
                <option selected value="">Selecione</option>
                <?php 
                    while($linha1 = mysqli_fetch_array($consulta_chamados)){
                        if($linha['chamado'] == $linha1['id']){
                            echo '<option selected value="'.$linha1['id'].'">'.$linha1['id'].'</option>'; 
                        }
                        else{
                            echo '<option value="'.$linha1['id'].'">'.$linha1['id'].'</option>';
                        }
                    }
                  ?>
            </select>
        </div>

        <div class="col-md-2">
            <label class="form-label" for="finalizado">Status</label>
            <?php
                $check1="";
                $check2="";
                    if($linha['finalizado'] == 1){
                        $check1="selected";
                    }else{
                        $check2="selected";
                    }
                ?>

            <select disabled name="finalizado" required class="form-select" id="finalizado">
                <option value="">Selecione</option>
                <option <?php echo $check2;?> value="0">Em aberto</option>
                <option <?php echo $check1;?> value="1">Finalizado</option>
            </select>
        </div>
        <div id="txt"></div>
        <div id="txt1"></div>
        
    </form>
    <div class="col-md-12">
            <button onclick="excluir()" class="btn btn-danger"><i class="fas fa-minus-circle fa-2x"></i></button>
        </div>
    <?php   }
        }
    ?>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Para relacionar a manutenção com chamado, selecione o ID do chamado no campo de seleção.
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<?php
    include('./HelpDesk/adm/manutencao/footer_page.php');
?>
</body>

</html>