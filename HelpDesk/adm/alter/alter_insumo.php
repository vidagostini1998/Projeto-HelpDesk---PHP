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
        while($linha=mysqli_fetch_array($consulta_alter_insumo)){ 
        if($linha['id']==$_GET['id']){
    ?>
        <form class="row g-3">
            <div class="col-md-1">
                <label for="id" class="form-label">ID</label>
                <input type="text" name="id_chamado" class="form-control text-center" id="id_chamado" readonly
                    value="<?php echo $linha['id'] ?>" disabled>
            </div>
            <div class="col-md-3">
                <label for="data_ab" class="form-label">Data Abertura</label>
                <input type="date" name="data_ab" class="form-control text-center" id="data_ab" readonly
                    value="<?php echo $linha['data_chamado'] ?>">
            </div>
            <div class="col-md-3">
                <label for="data_conclu" class="form-label">Data de Conclusão</label>
                <input type="date" class="form-control text-center" id="data_conclu"
                    value="<?php echo $linha['data_conclusão'] ?>" disabled>
            </div>
            <div class="col-md-2">
                <label for="solicitante" class="form-label">ID Solicitante</label>
                <input type="text" name="solicitante" class="form-control text-center" id="solicitante" readonly
                    value="<?php echo $linha['solicitante'] ?>" disabled>
            </div>
            <div class="col-md-2">
                <label for="soli" class="form-label"> Solicitante </label>
                <input type="text" id="soli" class="form-control text-center" value="<?php echo $linha['nome'] ?>"
                    disabled>
            </div>

            <div class="col-md-6">
                <label for="descricao" class="form-label">Descrição'</label>
                <textarea name="descricao" required class="form-control" id="descricao"
                    disabled><?php echo $linha['descricao'] ?></textarea>
            </div>

            <div class="col-md-6">
                <label for="inputAddress2" class="form-label">Solução</label>
                <textarea disabled class="form-control" id="solucao"
                    placeholder="Solução"> <?php echo $linha['solucao'] ?> </textarea>
            </div>

            <div class="col-md-6">
                <label for="obs" class="form-label">OBS</label>
                <textarea disabled name="obs" class="form-control" id="obs"
                    placeholder="OBS"><?php echo $linha['obs'] ?></textarea>
            </div>
            
            <div class="col-md-6 ">
            <label class="form-label">Atualizações</label>
            <div class="table-overflow">
                <table class="table border">
                    <tbody>
                        <?php
                            
                            while($linha4 = mysqli_fetch_array($consulta_atualiza_insu)){                               
                                echo '<tr><td>'.$linha4['data'].'</td>';
                                echo '<td>'.$linha4['descricao'].'</td>';
                                echo '<td>'.$linha4['nome'].'</td>';
                              }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-2">
            <label for="medida" class="form-label">Medida</label>
            <select disabled required id="medida" name="medida" class="form-select">
                <option>Selecione</option>
                <option <?php if($linha['medida'] == "Kg"){echo "selected";}else{} ?> value="Kg">Kg</option>
                <option <?php if($linha['medida'] == "Un"){echo "selected";}else{} ?> value="Un">Un</option>
            </select>
        </div>
        <div class="col-md-1">
            <label for="quantidade" required class="form-label">Quantidade</label>
            <input disabled required type="number" class="form-control" placeholder="0" min="0" step="0.01" name="quantidade"
                id="quantidade" value="<?php echo $linha['quantidade'];?>">
        </div>
            <div class="col-md-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select required disabled id="categoria" name="categoria" class="form-select">
                    <option>Selecione</option>
                    <?php 
                    while($linha1 = mysqli_fetch_array($consulta_categoria_insu)){
                        if($linha['categoria'] == $linha1['id_insu']){
                            $select = "selected";
                            echo '<option value="'.$linha1['id_insu'].'"'.$select.' >'.$linha1['nome_cate_insu'].'</option>';
                        }
                        else{
                            $select = "";
                            echo '<option value="'.$linha1['id_insu'].'"'.$select.' >'.$linha1['nome_cate_insu'].'</option>';
                        }
                    }
                  ?>
                </select>
            </div>
            <div class="col-md-3">

                <label for="patrimonio" class="form-label">Patrimonio</label>
                <select required id="patrimonio" disabled name="patrimonio" class="form-select"
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
                <select required id="local" disabled name="local" class="form-select">
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
                <select required id="filial" disabled name="filial" class="form-select">
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
            <?php
                if($linha['resolvido'] == 1){
            ?>
            <div class="col-md-1">
                <label for="resol" class="form-label">ID</label>
                <input type="text" class="form-control text-center" readonly id="id_reso" name="id_reso"
                    value="<?php echo $linha['id_reso']; ?>">
            </div>
            <div class="col-md-2">
                <label for="soli" class="form-label"> Resolvido por </label>
                <input type="text" disabled id="soli" class="form-control text-center"
                    value="<?php echo $linha['nome_reso']; ?>">
            </div>
            <?php
                }
                else{}
                ?>
            <div id="txt"></div>
            <div class="col-12">
                <a title="Alterar Chamado" class="btn btn-secondary" href="?page=alterar_insu_adm&id=<?php echo $linha['id']; ?>"><i class="far fa-edit fa-2x"></i></a>
                <?php

                    if($linha['resolvido'] == 2){
                        ?>
                        <a title="Reabrir Chamado" class="btn btn-success" href="?page=reabrir_insu&id=<?php echo $linha['id'];  ?>"><i class="far fa-folder-open fa-2x"></i></a>
                        <?php
                    }
                    else{
                        ?>
                        <a title="Resolver Chamado" class="btn btn-success" href="?page=re_insu_adm&id=<?php echo $linha['id']; ?>"> <i class="far fa-check-circle fa-2x"></i></a>
                        <?php
                    }
                
                ?>
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