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
                if($linha1['criar'] == 1){
                    
                }else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=inicio_helpdesk';</script>";
                }
            }
        }
        include('./HelpDesk/header/header3.php');
        include('./db.php');
        ?>
<br>
<div class="border-bottom">
    <h2 class="text-center">Cadastro de Equipamento</h2>
</div>
<div class="px-3 py-2 mb-3">
    <div class="text-end log">
        <a href="?page=consulta_equi" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
</div>
</header>

<div class="container-fluid border-top border-bottom border-1 border-primary borda">
    <form class="row g-3" action="./HelpDesk/cadastro/adc_equip.php" method="POST">
        <div class="col-md-2">
            <label for="data_ab" class="form-label">Data Inclusão</label>
            <input type="date" name="data_ab" class="form-control text-center" id="data_ab" readonly
                value="<?php echo date("Y-m-d"); ?>">
        </div>
        <div class="col-md-1">
            <label for="solicitante" class="form-label">ID</label>
            <input type="text" name="solicitante" class="form-control text-center" id="solicitante" readonly
                value="<?php echo $_SESSION['UsuarioID'];?>">

        </div>
        <div class="col-md-2">
            <label for="soli" class="form-label"> Solicitante </label>
            <input type="text" id="soli" class="form-control text-center" value="<?php echo $_SESSION['UsuarioNome'];?>"
                disabled>
        </div>

        <div class="col-md-6">
            <label for="patrimonio" class="form-label">Patrimonio</label>
            <input name="patrimonio" required class="form-control" id="problema" placeholder="Nº Patrimonio"></input>
        </div>

        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input class="form-control" required id="nome" name="nome" placeholder="Nome"></input>
        </div>

        <div class="col-md-6">
            <label for="marca" class="form-label">Marca</label>
            <input class="form-control" id="marca" name="marca" placeholder="Marca"></input>
        </div>
        <div class="col-md-6">
            <label for="modelo" class="form-label">Modelo</label>
            <input class="form-control" id="modelo" name="modelo" placeholder="Modelo"></input>
        </div>
        <div class="col-md-6">
            <label for="serie" class="form-label">Nº de Serie</label>
            <input class="form-control" id="serie" name="serie" placeholder="Nº de Serie"></input>
        </div>

        <div class="col-md-6">
            <label for="fornecedor" class="form-label">Fornecedor</label>
            <input class="form-control" id="fornecedor" name="fornecedor" placeholder="Fornecedor"></input>
        </div>
        <div class="col-md-6">
            <label for="fornecedor" class="form-label">Referencia</label>
            <input class="form-control" id="referencia" name="referencia" placeholder="Referencia"></input>
        </div>
        <div class="col-md-3">
            <label for="categoria" class="form-label">Categoria</label>
            <select id="categoria" required name="categoria" class="form-select">
                <option selected value="">Selecione</option>
                <?php 
                    while($linha = mysqli_fetch_array($consulta_cat_equip)){
                      echo '<option value="'.$linha['id_cate'].'">'.$linha['nome_cate'].'</option>';
                    }
                  ?>
            </select>
        </div>

        <div class="col-md-9">
            <label for="obs" class="form-label">OBS</label>
            <textarea name="obs" class="form-control" id="obs" placeholder="OBS"></textarea>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="situ" name="situ" value="0" checked>
            <label class="form-check-label" for="flexRadioDefault1">
                Ativo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="situ" name="situ" value="1">
            <label class="form-check-label" for="flexRadioDefault2">
                Inativo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="situ" name="situ" value="2">
            <label class="form-check-label" for="flexRadioDefault2">
                Em Manutenção
            </label>
        </div>
        <div class="col-md-5">
            <label for="motivo" class="form-label">Motivo</label>
            <textarea name="motivo" class="form-control" id="motivo" placeholder="Motivo"></textarea>
        </div>



        <div class="col-md-3">
            <label for="local" class="form-label">Local</label>
            <select id="local" required name="local" class="form-select">
                <option selected>Selecione</option>
                <?php 
                    while($linha = mysqli_fetch_array($consulta_local)){
                      echo '<option value="'.$linha['id_local'].'">'.$linha['nome_local'].'</option>';
                    }
                  ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="filial" class="form-label">Filial</label>
            <select id="filial" required name="filial" class="form-select">
                <option selected>Selecione</option>
                <?php 
                    while($linha = mysqli_fetch_array($consulta_filial)){
                      echo '<option value="'.$linha['id_filial'].'">'.$linha['nome_filial'].'</option>';
                    }
                  ?>
            </select>
        </div>
        <div id="txt"></div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success"><i class="far fa-check-circle fa-2x"></i></button>
        </div>
    </form>
</div>
<?php
    include('./HelpDesk/cadastro/footer_page.php');
?>
</body>

</html>