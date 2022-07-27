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
                if($linha1['criar'] == 1){   
                }else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=consulta_manutencao';</script>";
                }
            }
        }
        include('./HelpDesk/header/header3.php');
        include('./db.php');
        ?>
<br>
<div class="border-bottom">
    <h2 class="text-center">Adicionar Manutenção</h2>
</div>
<div class="px-3 py-2 mb-3">
    <div class="text-end log">
        <a href="?page=consulta_manutencao" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<div class="container-fluid border-top border-bottom border-1 border-primary borda">
    <form class="row g-3" action="./HelpDesk/adm/manutencao/pro_adc_manut.php" method="POST">
        <input type="hidden" name="id_soli" id="id_soli" value="<?php echo $_SESSION['UsuarioID']; ?>">
        <div class="col-md-2">
            <label for="data_manu" class="form-label">Data Manutenção</label>
            <input type="date" name="data_manut" class="form-control" id="data_manut">
        </div>
        <div class="col-md-2">
            <label for="data_realizado" class="form-label">Data Realizado</label>
            <input type="date" name="data_realizado" class="form-control" id="data_realizado">

        </div>

        <div class="col-md-3">
            <label for="solicitante" class="form-label"> Solicitante </label>
            <input type="text" id="solicitante" name="solicitante" class="form-control" placeholder="Nome Solicitante"
                required>
        </div>


        <div class="col-md-2">
            <label for="tipo" class="form-label">Tipo de Manutenção</label>
            <select required name="tipo" class="form-select" id="tipo">
                <option value="">Selecione</option>
                <option value="1">Corretiva</option>
                <option value="2">Preventiva</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="prestador" class="form-label">Prestador</label>
            <select name="prestador" class="form-select" id="prestador">
                <option selected value="">Selecione</option>
                <?php 
                    while($linha = mysqli_fetch_array($consulta_prestador)){
                        
                            echo '<option value="'.$linha['id_prestador'].'">'.$linha['nome_prestador'].'</option>';
                    }
                  ?>
            </select>
        </div>

        <div class="col-md-4">
            <label for="motivo" class="form-label">Motivo</label>
            <textarea name="motivo" required class="form-control" id="motivo" rows="3"></textarea>
        </div>
        <div class="col-md-4">
            <label for="problema" class="form-label">Problema</label>
            <textarea name="problema" required class="form-control" id="problema" rows="3"></textarea>
        </div>
        <div class="col-md-4">
            <label for="solucao" class="form-label">Solução</label>
            <textarea name="solucao" class="form-control" id="solucao" rows="3"></textarea>
        </div>
        <div class="col-md-4">
            <label for="obs" class="form-label">OBS</label>
            <textarea name="obs" class="form-control" id="obs" rows="2"></textarea>
        </div>
        <div class="col-md-2">
            <label for="patrimonio" class="form-label">Patrimonio</label>
            <select onchange="showCustomer(this.value)" name="patrimonio" required class="form-select" id="patrimonio">
                <option selected value="">Selecione</option>
                <?php 
                    while($linha = mysqli_fetch_array($consulta_patrimonio)){
                        if($linha['id_patrimonio'] == 0){

                        }else{
                            echo '<option value="'.$linha['id_patrimonio'].'">'.$linha['patrimonio'].'</option>';
                        }
                        
                            
                    }
                  ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="local" class="form-label">Local</label>
            <select name="local" required class="form-select" id="local">
                <option selected value="">Selecione</option>
                <?php 
                    while($linha = mysqli_fetch_array($consulta_local)){
                        
                            if($linha['id_local'] == 44){

                            }else{
                                echo '<option value="'.$linha['id_local'].'">'.$linha['nome_local'].'</option>';
                            }
                            
                        
                        
                            
                    }
                  ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="filial" class="form-label">Filial</label>
            <select name="filial" required class="form-select" id="filial">
                <option selected value="">Selecione</option>
                <?php 
                    while($linha = mysqli_fetch_array($consulta_filial)){

                            if($linha['id_filial'] == 6){

                            }else{
                                echo '<option value="'.$linha['id_filial'].'">'.$linha['nome_filial'].'</option>';
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
            <select onchange="showCustomer1(this.value)" name="chamado" class="form-select" id="chamado">
                <option selected value="0">Selecione</option>
                <?php 
                    while($linha = mysqli_fetch_array($consulta_chamados)){
                        
                            echo '<option value="'.$linha['id'].'">'.$linha['id'].'</option>';
                        
                        
                            
                    }
                  ?>
            </select>
        </div>

        <div class="col-md-2">
            <label class="form-label" for="finalizado">Status</label>


            <select name="finalizado" required class="form-select" id="finalizado">
                <option value="">Selecione</option>
                <option value="0">Em aberto</option>
                <option value="1">Finalizado</option>
            </select>
        </div>
        <div id="txt"></div>
        <div id="txt1"></div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success"><i class="far fa-check-circle fa-2x"></i></button>
        </div>
    </form>
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