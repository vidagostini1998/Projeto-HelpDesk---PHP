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
        while($linha1=mysqli_fetch_array($consulta_m_equipamento)){
            if($_SESSION['UsuarioID'] == $linha1['user']){
                if($linha1['alterar'] == 1){
                    
                }else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=inicio_helpdesk';</script>";
                }
            }
        }
        include('./HelpDesk/header/header3.php');
        include('./db.php');
        ?>
<div class="px-3 py-2 border-bottom mb-3">
    <div class="text-end log">
        <a href="?page=consulta_equi" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<?php
    while($linha=mysqli_fetch_array($consulta_equipamentos)){ 
    if($linha['id_patrimonio']==$_GET['id']){
?>
<div class="container-fluid">
    <form class="row g-3" action="./HelpDesk/alter/pro_alter_equip.php" method="POST">
        <input type="text" hidden value="<?php echo $linha['id_patrimonio'];?>" name="id_patrimonio" id="id_patrimonio">
        <div class="col-md-2">
            <label for="data_ab" class="form-label">Data Inclusão</label>
            <input type="date" name="data_ab" class="form-control text-center" id="data_ab"
                value="<?php echo $linha['data_inclu']; ?>">
        </div>

        <div class="col-md-1">
            <label for="solicitante" class="form-label">ID</label>
            <input type="text" name="solicitante" class="form-control text-center" id="solicitante" readonly
                value="<?php echo $linha['id_user'];?>">

        </div>
        <div class="col-md-2">
            <label for="soli" class="form-label"> Solicitante </label>
            <input type="text" id="soli" class="form-control text-center" value="<?php echo $linha['nome_user'];?>"
                disabled>
        </div>

        <div class="col-md-3">
            <label for="patrimonio" class="form-label">Patrimonio</label>
            <input name="patrimonio" required class="form-control" id="patrimonio" placeholder=""
                value="<?php echo $linha['patrimonio'];?>"></input>
        </div>

        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input class="form-control" required id="nome" name="nome" value="<?php echo $linha['nome']?>"></input>
        </div>

        <div class="col-md-6">
            <label for="marca" class="form-label">Marca</label>
            <input class="form-control" id="marca" name="marca" value="<?php echo $linha['marca']?>"></input>
        </div>
        <div class="col-md-6">
            <label for="modelo" class="form-label">Modelo</label>
            <input class="form-control" id="modelo" name="modelo" value="<?php echo $linha['modelo']?>"></input>
        </div>
        <div class="col-md-6">
            <label for="serie" class="form-label">Nº de Serie</label>
            <input class="form-control" id="serie" name="serie" value="<?php echo $linha['n_serie']?>"></input>
        </div>

        <div class="col-md-6">
            <label for="fornecedor" class="form-label">Fornecedor</label>
            <input class="form-control" id="fornecedor" name="fornecedor"
                value="<?php echo $linha['fornecedor']?>"></input>
        </div>
        <div class="col-md-6">
            <label for="ref" class="form-label">Referencia</label>
            <input class="form-control" id="ref" name="ref"
                value="<?php echo $linha['ref']?>"></input>
        </div>
        <div class="col-md-3">
            <label for="categoria" class="form-label">Categoria</label>
            <select id="categoria" required name="categoria" class="form-select">
                <option selected>Selecione</option>
                <?php 
                    while($linha1 = mysqli_fetch_array($consulta_cat_equip)){
                        if($linha['categoria'] == $linha1['id_cate']){
                            $select = "selected";
                            echo '<option value="'.$linha1['id_cate'].'" '.$select.'>'.$linha1['nome_cate'].'</option>';
                        }
                        else{
                            $select = "";
                            echo '<option value="'.$linha1['id_cate'].'" '.$select.'>'.$linha1['nome_cate'].'</option>';
                        }
                    }
                  ?>
            </select>
        </div>

        <div class="col-md-9">
            <label for="obs" class="form-label">OBS</label>
            <textarea name="obs" class="form-control" id="obs"><?php echo $linha['obs_patrimonio']?></textarea>
        </div>
        <div class="form-check">
            <?php
            $checked="";
            $checked1="";
            $checked2="";
            if($linha['situacao'] == 0){
                $checked = "checked";
            }
            else if($linha['situacao'] == 1){
                $checked1 = "checked";
            }
            else if($linha['situacao'] == 2){
                $checked2 = "checked";
            }
            ?>
            <input class="form-check-input" type="radio" id="situ" name="situ" value="0" <?php echo $checked;?>>
            <label class="form-check-label" for="flexRadioDefault1">
                Ativo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="situ" name="situ" value="1" <?php echo $checked1;?>>
            <label class="form-check-label" for="flexRadioDefault2">
                Inativo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="situ" name="situ" value="2" <?php echo $checked2;?>>
            <label class="form-check-label" for="flexRadioDefault2">
                Em manutenção
            </label>
        </div>
        <div class="col-md-5">
            <label for="motivo" class="form-label">Motivo</label>
            <textarea name="motivo" class="form-control" id="motivo"><?php echo $linha['motivo_situ'];?></textarea>
        </div>
        <div class="col-md-3">
            <label for="local" class="form-label">Local</label>
            <select id="local" required name="local" class="form-select">
                <option selected>Selecione</option>
                <?php 
                    while($linha1 = mysqli_fetch_array($consulta_local)){
                        if($linha['local_patrimonio'] == $linha1['id_local']){
                            $select = "selected";
                            echo '<option value="'.$linha1['id_local'].'" '.$select.'>'.$linha1['nome_local'].'</option>';
                        }
                        else{
                            $select = "";
                            echo '<option value="'.$linha1['id_local'].'" '.$select.'>'.$linha1['nome_local'].'</option>';
                        }
                    }
                  ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="filial" class="form-label">Filial</label>
            <select id="filial" required name="filial" class="form-select">
                <option selected>Selecione</option>
                <?php 
                    while($linha1 = mysqli_fetch_array($consulta_filial)){
                        if($linha['filial'] == $linha1['id_filial']){
                            $select = "selected";
                            echo '<option value="'.$linha1['id_filial'].'" '.$select.'>'.$linha1['nome_filial'].'</option>';
                        }
                        else{
                            $select = "";
                            echo '<option value="'.$linha1['id_filial'].'" '.$select.'>'.$linha1['nome_filial'].'</option>';
                        }
                    }
                  ?>
            </select>
        </div>
        <div id="txt"></div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success"><i class="far fa-edit fa-2x"></i></button>
        </div>
    </form>
    <?php   }
        }
    ?>
</div>
<?php
    include('./HelpDesk/alter/footer.php');
?>
</body>

</html>