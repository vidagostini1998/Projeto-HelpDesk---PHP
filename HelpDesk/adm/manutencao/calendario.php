<?php include('../../../db.php');$q1=$_GET['q1'];$tipo=$_GET['tipo'];$inicio=$q1."-01-01";$fim=$q1."-12-31"; ?><h5
    class="text-center">Calendario<?php echo $q1; ?></h5>
<div class="text-center"><input class="btn btn-success m-2" onclick="printdiv()" type="button" value="Visualizar"><br>
</div>
<div class="bg-white container-fluid" id="calendario_tb">
    <div class="row">
        <div class="border border-1 col-2">
            <div class="row">
                <div class="text-center col-12">Janeiro</div>
            </div>
            <div class="row">
                <?php $query_ca_janeiro="SELECT M.*, P.patrimonio FROM manutencao M JOIN patrimonio P ON M.patrimonio = P.id_patrimonio WHERE M.filial = '$tipo'";$consulta_calendario=mysqli_query($conexao,$query_ca_janeiro);while($linha=mysqli_fetch_array($consulta_calendario)){if($linha['finalizado']==1&&$linha['data_realizada']>=$q1."-01-01"&&$linha['data_realizada']<=$q1."-01-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-success text-decoration-line-through"><?php $dia=substr($linha['data_realizada'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div>
                <?php }if($linha['finalizado']==0&&$linha['data_manut']>=$q1."-01-01"&&$linha['data_manut']<=$q1."-01-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-secondary"><?php $dia=substr($linha['data_manut'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div><?php }} ?></div>
        </div>
        <div class="border border-1 col-2">
            <div class="row">
                <div class="text-center col-12">Fevereiro</div>
            </div>
            <div class="row">
                <?php $query_ca_fevereiro="SELECT M.*, P.patrimonio FROM manutencao M JOIN patrimonio P ON M.patrimonio = P.id_patrimonio WHERE M.filial = '$tipo'";$consulta_calendario=mysqli_query($conexao,$query_ca_fevereiro);while($linha=mysqli_fetch_array($consulta_calendario)){if($linha['finalizado']==1&&$linha['data_realizada']>=$q1."-02-01"&&$linha['data_realizada']<=$q1."-02-28"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-success text-decoration-line-through"><?php $dia=substr($linha['data_realizada'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div>
                <?php }if($linha['finalizado']==0&&$linha['data_manut']>=$q1."-02-01"&&$linha['data_manut']<=$q1."-02-28"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-secondary"><?php $dia=substr($linha['data_manut'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div><?php }} ?></div>
        </div>
        <div class="border border-1 col-2">
            <div class="row">
                <div class="text-center col-12">Março</div>
            </div>
            <div class="row">
                <?php $query_ca_marco="SELECT M.*, P.patrimonio FROM manutencao M JOIN patrimonio P ON M.patrimonio = P.id_patrimonio WHERE M.filial = '$tipo'";$consulta_calendario=mysqli_query($conexao,$query_ca_marco);while($linha=mysqli_fetch_array($consulta_calendario)){if($linha['finalizado']==1&&$linha['data_realizada']>=$q1."-03-01"&&$linha['data_realizada']<=$q1."-03-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-success text-decoration-line-through"><?php $dia=substr($linha['data_realizada'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div>
                <?php }if($linha['finalizado']==0&&$linha['data_manut']>=$q1."-03-01"&&$linha['data_manut']<=$q1."-03-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-secondary"><?php $dia=substr($linha['data_manut'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div><?php }} ?></div>
        </div>
        <div class="border border-1 col-2">
            <div class="row">
                <div class="text-center col-12">Abril</div>
            </div>
            <div class="row">
                <?php $query_ca_abril="SELECT M.*, P.patrimonio FROM manutencao M JOIN patrimonio P ON M.patrimonio = P.id_patrimonio WHERE M.filial = '$tipo'";$consulta_calendario=mysqli_query($conexao,$query_ca_abril);while($linha=mysqli_fetch_array($consulta_calendario)){if($linha['finalizado']==1&&$linha['data_realizada']>=$q1."-04-01"&&$linha['data_realizada']<=$q1."-04-30"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-success text-decoration-line-through"><?php $dia=substr($linha['data_realizada'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div>
                <?php }if($linha['finalizado']==0&&$linha['data_manut']>=$q1."-04-01"&&$linha['data_manut']<=$q1."-04-30"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-secondary"><?php $dia=substr($linha['data_manut'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div><?php }} ?></div>
        </div>
        <div class="border border-1 col-2">
            <div class="row">
                <div class="text-center col-12">Maio</div>
            </div>
            <div class="row">
                <?php $query_ca_maio="SELECT M.*, P.patrimonio FROM manutencao M JOIN patrimonio P ON M.patrimonio = P.id_patrimonio WHERE M.filial = '$tipo'";$consulta_calendario=mysqli_query($conexao,$query_ca_maio);while($linha=mysqli_fetch_array($consulta_calendario)){if($linha['finalizado']==1&&$linha['data_realizada']>=$q1."-05-01"&&$linha['data_realizada']<=$q1."-05-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-success text-decoration-line-through"><?php $dia=substr($linha['data_realizada'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div>
                <?php }if($linha['finalizado']==0&&$linha['data_manut']>=$q1."-05-01"&&$linha['data_manut']<=$q1."-05-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-secondary"><?php $dia=substr($linha['data_manut'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div><?php }} ?></div>
        </div>
        <div class="border border-1 col-2">
            <div class="row">
                <div class="text-center col-12">Junho</div>
            </div>
            <div class="row">
                <?php $query_ca_junho="SELECT M.*, P.patrimonio FROM manutencao M JOIN patrimonio P ON M.patrimonio = P.id_patrimonio WHERE M.filial = '$tipo'";$consulta_calendario=mysqli_query($conexao,$query_ca_junho);while($linha=mysqli_fetch_array($consulta_calendario)){if($linha['finalizado']==1&&$linha['data_realizada']>=$q1."-06-01"&&$linha['data_realizada']<=$q1."-06-30"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-success text-decoration-line-through"><?php $dia=substr($linha['data_realizada'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div>
                <?php }if($linha['finalizado']==0&&$linha['data_manut']>=$q1."-06-01"&&$linha['data_manut']<=$q1."-06-30"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-secondary"><?php $dia=substr($linha['data_manut'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div><?php }} ?></div>
        </div>
        <div class="border border-1 col-2">
            <div class="row">
                <div class="text-center col-12">Julho</div>
            </div>
            <div class="row">
                <?php $query_ca_julho="SELECT M.*, P.patrimonio FROM manutencao M JOIN patrimonio P ON M.patrimonio = P.id_patrimonio WHERE M.filial = '$tipo'";$consulta_calendario=mysqli_query($conexao,$query_ca_julho);while($linha=mysqli_fetch_array($consulta_calendario)){if($linha['finalizado']==1&&$linha['data_realizada']>=$q1."-07-01"&&$linha['data_realizada']<=$q1."-07-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-success text-decoration-line-through"><?php $dia=substr($linha['data_realizada'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div>
                <?php }if($linha['finalizado']==0&&$linha['data_manut']>=$q1."-07-01"&&$linha['data_manut']<=$q1."-07-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-secondary"><?php $dia=substr($linha['data_manut'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div><?php }} ?></div>
        </div>
        <div class="border border-1 col-2">
            <div class="row">
                <div class="text-center col-12">Agosto</div>
            </div>
            <div class="row">
                <?php $query_ca_agosto="SELECT M.*, P.patrimonio FROM manutencao M JOIN patrimonio P ON M.patrimonio = P.id_patrimonio WHERE M.filial = '$tipo'";$consulta_calendario=mysqli_query($conexao,$query_ca_agosto);while($linha=mysqli_fetch_array($consulta_calendario)){if($linha['finalizado']==1&&$linha['data_realizada']>=$q1."-08-01"&&$linha['data_realizada']<=$q1."-08-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-success text-decoration-line-through"><?php $dia=substr($linha['data_realizada'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div>
                <?php }if($linha['finalizado']==0&&$linha['data_manut']>=$q1."-08-01"&&$linha['data_manut']<=$q1."-08-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-secondary"><?php $dia=substr($linha['data_manut'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div><?php }} ?></div>
        </div>
        <div class="border border-1 col-2">
            <div class="row">
                <div class="text-center col-12">Setembro</div>
            </div>
            <div class="row">
                <?php $query_ca_setembro="SELECT M.*, P.patrimonio FROM manutencao M JOIN patrimonio P ON M.patrimonio = P.id_patrimonio WHERE M.filial = '$tipo'";$consulta_calendario=mysqli_query($conexao,$query_ca_setembro);while($linha=mysqli_fetch_array($consulta_calendario)){if($linha['finalizado']==1&&$linha['data_realizada']>=$q1."-09-01"&&$linha['data_realizada']<=$q1."-09-30"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-success text-decoration-line-through"><?php $dia=substr($linha['data_realizada'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div>
                <?php }if($linha['finalizado']==0&&$linha['data_manut']>=$q1."-09-01"&&$linha['data_manut']<=$q1."-09-30"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-secondary"><?php $dia=substr($linha['data_manut'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div><?php }} ?></div>
        </div>
        <div class="border border-1 col-2">
            <div class="row">
                <div class="text-center col-12">Outubro</div>
            </div>
            <div class="row">
                <?php $query_ca_outubro="SELECT M.*, P.patrimonio FROM manutencao M JOIN patrimonio P ON M.patrimonio = P.id_patrimonio WHERE M.filial = '$tipo'";$consulta_calendario=mysqli_query($conexao,$query_ca_outubro);while($linha=mysqli_fetch_array($consulta_calendario)){if($linha['finalizado']==1&&$linha['data_realizada']>=$q1."-10-01"&&$linha['data_realizada']<=$q1."-10-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-success text-decoration-line-through"><?php $dia=substr($linha['data_realizada'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div>
                <?php }if($linha['finalizado']==0&&$linha['data_manut']>=$q1."-10-01"&&$linha['data_manut']<=$q1."-10-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-secondary"><?php $dia=substr($linha['data_manut'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div><?php }} ?></div>
        </div>
        <div class="border border-1 col-2">
            <div class="row">
                <div class="text-center col-12">Novembro</div>
            </div>
            <div class="row">
                <?php $query_ca_novembro="SELECT M.*, P.patrimonio FROM manutencao M JOIN patrimonio P ON M.patrimonio = P.id_patrimonio WHERE M.filial = '$tipo'";$consulta_calendario=mysqli_query($conexao,$query_ca_novembro);while($linha=mysqli_fetch_array($consulta_calendario)){if($linha['finalizado']==1&&$linha['data_realizada']>=$q1."-11-01"&&$linha['data_realizada']<=$q1."-11-30"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-success text-decoration-line-through"><?php $dia=substr($linha['data_realizada'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div>
                <?php }if($linha['finalizado']==0&&$linha['data_manut']>=$q1."-11-01"&&$linha['data_manut']<=$q1."-11-30"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-secondary"><?php $dia=substr($linha['data_manut'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div><?php }} ?></div>
        </div>
        <div class="border border-1 col-2">
            <div class="row">
                <div class="text-center col-12">Dezembro</div>
            </div>
            <div class="row">
                <?php $query_ca_dezembro="SELECT M.*, P.patrimonio FROM manutencao M JOIN patrimonio P ON M.patrimonio = P.id_patrimonio WHERE M.filial = '$tipo'";$consulta_calendario=mysqli_query($conexao,$query_ca_dezembro);while($linha=mysqli_fetch_array($consulta_calendario)){if($linha['finalizado']==1&&$linha['data_realizada']>=$q1."-12-01"&&$linha['data_realizada']<=$q1."-12-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-success text-decoration-line-through"><?php $dia=substr($linha['data_realizada'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div>
                <?php }if($linha['finalizado']==0&&$linha['data_manut']>=$q1."-12-01"&&$linha['data_manut']<=$q1."-12-31"){ ?>
                <div class="text-center col-5"><span
                        class="badge m-1 p-1 bg-secondary"><?php $dia=substr($linha['data_manut'],8,2);echo $dia."-".$linha['patrimonio']; ?></span>
                </div><?php }} ?></div>
        </div>
    </div>
</div>