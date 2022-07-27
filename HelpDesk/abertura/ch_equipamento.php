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
        while($linha1=mysqli_fetch_array($consulta_m_chamado)){
            if($_SESSION['UsuarioID'] == $linha1['user']){
                if($linha1['criar']==1){
                }else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=inicio_helpdesk';</script>";
                }
            }
        }
        include('./HelpDesk/header/header1.php');
        include('./db.php');
        
        
      
        ?>
        <div class="container-fluid border-top border-bottom border-1 border-primary borda">

            <form class="row g-3" action="./HelpDesk/abertura/pro_equipamento.php" method="POST">
                <div class="col-md-2">
                    <label for="data_ab" class="form-label">Data Abertura</label>
                    <input type="date" name="data_ab" class="form-control text-center" id="data_ab" readonly
                        value="<?php echo date("Y-m-d");?>">
                </div>
                <div class="col-md-1">
                    <label for="solicitante" class="form-label">ID</label>
                    <input type="text" name="solicitante" class="form-control text-center" id="solicitante" readonly
                        value="<?php echo $_SESSION['UsuarioID'];?>">

                </div>
                <div class="col-md-2">
                    <label for="soli" class="form-label"> Solicitante </label>
                    <input type="text" id="soli" class="form-control text-center"
                        value="<?php echo $_SESSION['UsuarioNome'];?>" disabled>
                </div>

                <div class="col-md-6">
                    <label for="problema" class="form-label">Problema</label>
                    <textarea name="problema" class="form-control" id="problema" placeholder="Descreva o problema"
                        required></textarea>
                </div>
                <div class="col-md-6">
                    <label for="obs" class="form-label">OBS</label>
                    <textarea name="obs" class="form-control" id="obs" placeholder="OBS"></textarea>
                </div>
                <div class="col-md-1">

                    <label for="patrimonio" class="form-label">Patrimonio</label>
                    <select required id="patrimonio" name="patrimonio" class="form-select"
                        onchange="showCustomer(this.value)">
                        <option selected></option>
                        <?php 
                    while($linha = mysqli_fetch_array($consulta_patrimonio)){
                        if($linha['id_patrimonio'] == 0){
                            
                        }
                        else{
                            echo '<option value="'.$linha['id_patrimonio'].'">'.$linha['patrimonio'].'</option>';
                        }
                      
                    }
                  ?>

                    </select>
                </div>

                <div id="txt">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success"><i class="far fa-check-circle fa-2x"></i></button>
                </div>
            </form>

        </div>
        <?php
        include('./HelpDesk/abertura/footer.php');
        ?>
        </body>

        </html>