<footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="../../js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function(){$("#table1").DataTable({info:!1,responsive:!0,lengthMenu:[[10,25,50,-1],[10,25,50,"Todos"]],language:{lengthMenu:"_MENU_ Itens",zeroRecords:"Não encontrado",info:"Pagina _PAGE_ de _PAGES_",infoEmpty:"Não Existe Itens",search:"Busca:",infoFiltered:"(Filtrado de _MAX_ Itens)",paginate:{first:"Primeiro",last:"Ultimo",next:"Proximo",previous:"Anterior"}},dom:"Bftpl",buttons:[{extend:"excel",text:"Excel",title:""},{extend:"print",text:"Imprimir",messageBottom:null}]}),$("#table2").DataTable({info:!1,responsive:!0,order:[[1,"asc"]],lengthMenu:[[10,25,50,-1],[10,25,50,"Todos"]],language:{lengthMenu:"_MENU_ Itens",zeroRecords:"Não encontrado",info:"Pagina _PAGE_ de _PAGES_",infoEmpty:"Não Existe Itens",search:"Busca:",infoFiltered:"(Filtrado de _MAX_ Itens)",paginate:{first:"Primeiro",last:"Ultimo",next:"Proximo",previous:"Anterior"},decimal:",",thousands:"."},dom:"Bftpl",buttons:[{extend:"excel",text:"Excel",title:""}],initComplete:function(){this.api().columns().every(function(){var t=this,o=$('<select class="form-select"><option value=""></option></select>').appendTo($(t.footer()).empty()).on("change",function(){var e=$.fn.dataTable.util.escapeRegex($(this).val());t.search(e?"^"+e+"$":"",!0,!1).draw()});t.data().unique().sort().each(function(e,t){o.append('<option value="'+e+'">'+e+"</option>")})})}}),$("#table4").DataTable({info:!1,responsive:!0,order:[[1,"asc"]],lengthMenu:[[10,25,50,-1],[10,25,50,"Todos"]],language:{lengthMenu:"_MENU_ Itens",zeroRecords:"Não encontrado",info:"Pagina _PAGE_ de _PAGES_",infoEmpty:"Não Existe Itens",search:"Busca:",infoFiltered:"(Filtrado de _MAX_ Itens)",paginate:{first:"Primeiro",last:"Ultimo",next:"Proximo",previous:"Anterior"}},dom:"Bftpl",buttons:[{extend:"excel",text:"Excel",title:""}],initComplete:function(){this.api().columns().every(function(){var t=this,o=$('<select class="form-select"><option value=""></option></select>').appendTo($(t.footer()).empty()).on("change",function(){var e=$.fn.dataTable.util.escapeRegex($(this).val());t.search(e?"^"+e+"$":"",!0,!1).draw()});t.data().unique().sort().each(function(e,t){o.append('<option value="'+e+'">'+e+"</option>")})})}}),$("#table5").DataTable({info:!1,responsive:!0,order:[[1,"asc"]],lengthMenu:[[10,25,50,-1],[10,25,50,"Todos"]],language:{lengthMenu:"_MENU_ Itens",zeroRecords:"Não encontrado",info:"Pagina _PAGE_ de _PAGES_",infoEmpty:"Não Existe Itens",search:"Busca:",infoFiltered:"(Filtrado de _MAX_ Itens)",paginate:{first:"Primeiro",last:"Ultimo",next:"Proximo",previous:"Anterior"}},dom:"Bftpl",buttons:[{extend:"excel",text:"Excel",title:""}],initComplete:function(){this.api().columns().every(function(){var t=this,o=$('<select class="form-select"><option value=""></option></select>').appendTo($(t.footer()).empty()).on("change",function(){var e=$.fn.dataTable.util.escapeRegex($(this).val());t.search(e?"^"+e+"$":"",!0,!1).draw()});t.data().unique().sort().each(function(e,t){o.append('<option value="'+e+'">'+e+"</option>")})})}}),$("#table6").DataTable({info:!1,responsive:!0,order:[[1,"asc"]],lengthMenu:[[10,25,50,-1],[10,25,50,"Todos"]],language:{lengthMenu:"_MENU_ Itens",zeroRecords:"Não encontrado",info:"Pagina _PAGE_ de _PAGES_",infoEmpty:"Não Existe Itens",search:"Busca:",infoFiltered:"(Filtrado de _MAX_ Itens)",paginate:{first:"Primeiro",last:"Ultimo",next:"Proximo",previous:"Anterior"}},dom:"Bftpl",buttons:[{extend:"excel",text:"Excel",title:""}],initComplete:function(){this.api().columns().every(function(){var t=this,o=$('<select class="form-select"><option value=""></option></select>').appendTo($(t.footer()).empty()).on("change",function(){var e=$.fn.dataTable.util.escapeRegex($(this).val());t.search(e?"^"+e+"$":"",!0,!1).draw()});t.data().unique().sort().each(function(e,t){o.append('<option value="'+e+'">'+e+"</option>")})})}}),$("#table3").DataTable({info:!1,responsive:!0,order:[[0,"desc"]],lengthMenu:[[10,25,50,-1],[10,25,50,"Todos"]],language:{lengthMenu:"_MENU_ Itens",zeroRecords:"Não encontrado",info:"Pagina _PAGE_ de _PAGES_",infoEmpty:"Não Existe Itens",search:"Busca:",infoFiltered:"(Filtrado de _MAX_ Itens)",paginate:{first:"Primeiro",last:"Ultimo",next:"Proximo",previous:"Anterior"}},dom:"Bftpl",buttons:[{extend:"excel",text:"Excel",title:""},{extend:"print",text:"Imprimir",messageBottom:null}]})});
  </script>
  <script>
    var popoverTriggerList=[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')),popoverList=popoverTriggerList.map(function(o){return new bootstrap.Popover(o)});
  </script>

  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="../../js/functions.js"></script>
</footer>