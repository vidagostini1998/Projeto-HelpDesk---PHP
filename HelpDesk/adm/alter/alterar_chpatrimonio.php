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
        while($linha1=mysqli_fetch_array($consulta_m_gchamado)){
            if($_SESSION['UsuarioID'] == $linha1['user']){
                if($linha1['alterar'] == 1){   
                }else{
                    echo "<script>alert('Você não tem permissão para acesso nesta pagina! Contate o Administrador'); location= '/?page=adm';</script>";
                }
            }
        }
        
        include('./db.php');
        ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelpDesk VHD WebSites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/headers.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="shortcut icon" href="../img/help-desk.png" />
    <script src="https://kit.fontawesome.com/d4a766c662.js" crossorigin="anonymous"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body>
    <header>
        <div class="px-3 py-2 bg-info">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                    <a href="#"
                        class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <img src="../../img/help-desk.png" alt="" style="width: 70px;">
                    </a>

                </div>
            </div>
        </div>
        <br>
        <div class="border-bottom">
            <h2 class="text-center">Alterar Chamado</h2>
        </div>
        <div class="px-3 py-2 mb-3">
            <div class="text-end log">
                <a class="btn btn-primary" href="?page=chamados"><i class="fas fa-arrow-circle-left"></i></a>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <?php
        while($linha=mysqli_fetch_array($consulta_alter_chamados)){ 
        if($linha['id']==$_GET['id']){
    ?>
        <form class="row g-3" action="./HelpDesk/adm/alter/pro_alterchequip.php" method="POST">
            <div class="col-md-1">
                <label for="id" class="form-label">ID</label>
                <input type="text" name="id_chamado" class="form-control text-center" id="id_chamado" readonly
                    value="<?php echo $linha['id'] ?>" readonly>

            </div>
            <div class="col-md-3">
                <label for="data_ab" class="form-label">Data Abertura</label>
                <input type="date" required name="data_ab" s class="form-control text-center" id="data_ab"
                    value="<?php echo $linha['data_chamado'] ?>">
            </div>

            <div class="col-md-3">
                <label for="data_conclu" class="form-label">Data de Conclusão</label>
                <input type="date" name="data_conclu" class="form-control text-center" id="data_conclu" value="<?php echo $linha['data_conclusão'] ?>"
                    >
            </div>

            <div class="col-md-2">
                <label for="solicitante" class="form-label">ID Solicitante</label>
                <input type="text" name="solicitante" class="form-control text-center" id="solicitante" readonly
                    value="<?php echo $linha['solicitante'] ?>">

            </div>
            <div class="col-md-2">
                <label for="soli" class="form-label"> Solicitante </label>
                <input type="text" disabled id="soli" class="form-control text-center"
                    value="<?php echo $linha['nome'] ?>">
            </div>

            <div class="col-md-6">
                <label for="problema" class="form-label">Problema</label>
                <textarea required name="problema" class="form-control"
                    id="problema"><?php echo $linha['problema'] ?></textarea>
            </div>

            <div class="col-md-6">
                <label for="inputAddress2" class="form-label">Solução</label>
                <textarea required class="form-control" id="solucao" name="solucao" placeholder="Solução"
                    > <?php echo $linha['solucao'] ?> </textarea>
            </div>

            <div class="col-md-6">
                <label for="obs" class="form-label">OBS</label>
                <textarea name="obs" class="form-control" id="obs"
                    placeholder="OBS"><?php echo $linha['obs'] ?></textarea>
            </div>
            <div class="col-md-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select required id="categoria" name="categoria" class="form-select">
                    <option>Selecione</option>
                    <?php 
                    while($linha1 = mysqli_fetch_array($consulta_categoria)){
                        if($linha['categoria'] == $linha1['id_cate']){
                            $select = "selected";
                            echo '<option value="'.$linha1['id_cate'].'"'.$select.' >'.$linha1['nome_cate'].'</option>';
                        }
                        else{
                            $select = "";
                            echo '<option value="'.$linha1['id_cate'].'"'.$select.' >'.$linha1['nome_cate'].'</option>';
                        }
                    }
                  ?>
                </select>
            </div>
            <div class="col-md-3">

                <label for="patrimonio" class="form-label">Patrimonio</label>
                <select required id="patrimonio" name="patrimonio" class="form-select"
                    onchange="showCustomer(this.value)">

                    <?php 
                    while($linha1 = mysqli_fetch_array($consulta_patrimonio)){
                        if($linha['patrimonio'] == $linha1['id_patrimonio']){
                            $select = "selected";
                        echo '<option value="'.$linha1['id_patrimonio'].'" '.$select.'>'.$linha1['patrimonio'].'</option>';
                        }
                        else{
                            $select = "";
                            echo '<option value="'.$linha1['id_patrimonio'].'" '.$select.'>'.$linha1['patrimonio'].'</option>';
                        }
                    }
                  ?>

                </select>
            </div>
            <div class="col-md-3">
                <label for="local" class="form-label">Local</label>
                <select required id="local" name="local" class="form-select">
                    <option selected>Selecione</option>
                    <?php 
                    while($linha1 = mysqli_fetch_array($consulta_local)){
                        if($linha['local'] == $linha1['id_local']){
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
                <select required id="filial" name="filial" class="form-select">
                    <option >Selecione</option>
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
            <div class="col-12">
                <button type="submit" class="btn btn-success"><i class="far fa-check-circle fa-2x"></i></button>
            </div>
        </form>
        <?php   }
        }
    ?>
    </div>
    <?php
    include('./HelpDesk/adm/alter/footer.php');
?>
</body>

</html>