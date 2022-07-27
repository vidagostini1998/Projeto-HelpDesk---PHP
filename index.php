<?php 
session_cache_expire(10);
session_start();
include 'db.php';
if (isset($_SESSION['login'])) {
    if (isset($_GET['page'])) {
        $pagina = $_GET['page'];
    } else {
        $pagina = 'inicio';
    }
} else {
    $pagina = 'login';
}
switch ($pagina) {
    case 'inicio':
        include 'home.php';
        break;
    case 'inicio_helpdesk':
        include 'HelpDesk/home.php';
        break;
    case 'inicio_adm':
        include './Administracao/home.php';
        break;
    case 'sessao':
        include './HelpDesk/sessao.php';
        break;
    case 'abrir_chequip':
        include './HelpDesk/abertura/ch_equipamento.php';
        break;
    case 'abrir_chinsu':
        include './HelpDesk/abertura/ch_insumo.php';
        break;
    case 'consulta_equi':
        include './HelpDesk/cadastro/equipamentos.php';
        break;
    case 'adc_equi':
        include './HelpDesk/cadastro/cad_equi.php';
        break;
    case 'consulta_categoria':
        include './HelpDesk/cadastro/categorias.php';
        break;
    case 'cad_catequi':
        include './HelpDesk/cadastro/cat_equip.php';
        break;
    case 'cad_catinsu':
        include './HelpDesk/cadastro/cat_insumo.php';
        break;
    case 'consulta_local':
        include './HelpDesk/cadastro/local.php';
        break;
    case 'adc_local':
        include './HelpDesk/cadastro/adc_local.php';
        break;
    case 'editar_chequip':
        include './HelpDesk/alter/alter_chequip.php';
        break;
    case 'alterar_chpatrimonio':
        include './HelpDesk/alter/alterar_chpatrimonio.php';
        break;
    case 'resolver_chequip':
        include './HelpDesk/alter/re_chequipe.php';
        break;
    case 'editar_chinsu':
        include './HelpDesk/alter/alter_insumo.php';
        break;
    case 'alter_chinsumo':
        include './HelpDesk/alter/alter_chinsumo.php';
        break;
    case 'resolver_chinsumo':
        include './HelpDesk/alter/re_chinsumo.php';
        break;
    case 'alter_equipamento':
        include './HelpDesk/alter/alterar_equipamento.php';
        break;
    case 'alter_ca_equip':
        include './HelpDesk/alter/alterar_ca_equip.php';
        break;
    case 'alter_ca_insu':
        include './HelpDesk/alter/alterar_ca_insu.php';
        break;
    case 'alterar_local':
        include './HelpDesk/alter/alterar_local.php';
        break;
    case 'excluir_equip':
        include './HelpDesk/delete/excluir_ca_equip.php';
        break;
    case 'excluir_insu':
        include './HelpDesk/delete/excluir_ca_insu.php';
        break;
    case 'excluir_local':
        include './HelpDesk/delete/excluir_local.php';
        break;
    case 'adm':
        include './HelpDesk/adm/home_adm.php';
        break;
    case 'chamados':
        include './HelpDesk/adm/consultas/chamados.php';
        break;
    case 'usuarios':
        include './Administracao/Usuarios/usuarios.php';
        break;
    case 'adc_user':
        include './Administracao/Usuarios/adc_user.php';
        break;
    case 'exclui_user':
        include './Administracao/Usuarios/exclui_user.php';
        break;
    case 'alter_user':
        include './Administracao/Usuarios/alter_user.php';
        break;
    case 'equip_adm':
        include './HelpDesk/adm/alter/alter_chequip.php';
        break;
    case 'insu_adm':
        include './HelpDesk/adm/alter/alter_insumo.php';
        break;
    case 'alterar_equip_adm':
        include './HelpDesk/adm/alter/alterar_chpatrimonio.php';
        break;
    case 'alterar_insu_adm':
        include './HelpDesk/adm/alter/alter_chinsumo.php';
        break;
    case 'atualiza_insu':
        include './HelpDesk/alter/atualizacao_insu.php';
        break;
    case 'atualiza_equip':
        include './HelpDesk/alter/atualizacao_equip.php';
        break;
    case 'log':
        include './Administracao/log/table.php';
        break;
    case 'sobre':
        include './HelpDesk/adm/sobre.php';
        break;
    case 'habilita_user':
        include './Administracao/Usuarios/habilita_user.php';
        break;
    case 'consulta_filial':
        include './HelpDesk/cadastro/filial.php';
        break;
    case 'adc_filial':
        include './HelpDesk/cadastro/adc_filial.php';
        break;
    case 'excluir_filial':
        include './HelpDesk/delete/excluir_filial.php';
        break;
    case 'alterar_filial':
        include './HelpDesk/alter/alterar_filial.php';
        break;
    case 'consulta_manutencao':
        include './HelpDesk/adm/manutencao/consulta.php';
        break;
    case 'exclui_manut':
        include './HelpDesk/adm/manutencao/exclui_manut.php';
        break;
    case 'prestador':
        include './HelpDesk/adm/manutencao/prestador.php';
        break;
    case 'adc_manut':
        include './HelpDesk/adm/manutencao/adc_manut.php';
        break;
    case 'editar_manut':
        include './HelpDesk/adm/manutencao/alter_manut.php';
        break;
    case 'produto':
        include './HelpDesk/adm/estoque/produto/produto.php';
        break;
    case 'adc_produto':
        include './HelpDesk/adm/estoque/produto/adc_produto.php';
        break;
    case 'editar_produto':
        include './HelpDesk/adm/estoque/produto/editar_produto.php';
        break;
    case 'desabilita_produto':
        include './HelpDesk/adm/estoque/produto/desabilita_produto.php';
        break;
    case 'habilita_produto':
        include './HelpDesk/adm/estoque/produto/habilita_produto.php';
        break;
    case 'movimentacao':
        include './HelpDesk/adm/estoque/movimentacao/movimentacao.php';
        break;
    case 'adc_entrada':
        include './HelpDesk/adm/estoque/movimentacao/adc_entrada.php';
        break;
    case 'adc_saida':
        include './HelpDesk/adm/estoque/movimentacao/adc_saida.php';
        break;
    case 'alter_entrada':
        include './HelpDesk/adm/estoque/movimentacao/alter_entrada.php';
        break;
    case 'alter_saida':
        include './HelpDesk/adm/estoque/movimentacao/alter_saida.php';
        break;
    case 'exclui_entrada':
        include './HelpDesk/adm/estoque/movimentacao/exclui_entrada.php';
        break;
    case 'exclui_saida':
        include './HelpDesk/adm/estoque/movimentacao/exclui_saida.php';
        break;
    case 'fornecedores':
        include './HelpDesk/adm/estoque/fornecedores/fornecedores.php';
        break;
    case 'adc_fornecedor':
        include './HelpDesk/adm/estoque/fornecedores/adc_fornecedor.php';
        break;
    case 'adc_prestador':
        include './HelpDesk/adm/manutencao/adc_prestador.php';
        break;
    case 'alterar_prestador':
        include './HelpDesk/adm/manutencao/alter_prestador.php';
        break;
    case 'excluir_prestador':
        include './HelpDesk/adm/manutencao/exclui_prestador.php';
        break;
    case 'reabrir_equip':
        include './HelpDesk/adm/alter/reabrir_equip.php';
        break;
    case 'reabrir_insu':
        include './HelpDesk/adm/alter/reabrir_insu.php';
        break;
    case 're_equip_adm':
        include './HelpDesk/adm/alter/re_equip.php';
        break;
    case 're_insu_adm':
        include './HelpDesk/adm/alter/re_insu.php';
        break;
    case 'calendario':
        include './HelpDesk/adm/manutencao/calendario_manut.php';
        break;
    case 'chamados_usuario':
        include './HelpDesk/consulta/chamados_usuario.php';
        break;
    case 'equipamento_usuario':
        include './HelpDesk/consulta/equipamento.php';
        break;
    case 'insumo_usuario':
        include './HelpDesk/consulta/insumo.php';
        break;
    case 'error':
        include './Error/error.php';
        break;
    default:
        include 'login.php';
        break;
}