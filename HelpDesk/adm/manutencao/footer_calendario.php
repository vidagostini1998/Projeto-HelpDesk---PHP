<footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    var popoverTriggerList=[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')),popoverList=popoverTriggerList.map(function(o){return new bootstrap.Popover(o)});
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="../js/jspdf.min.js"></script>
  <script>
    function printdiv(){var e=document.getElementById("calendario_tb");html2pdf().set({margin:[1,1,1,1],filename:"calendario",image:{type:"jpeg",quality:.98},html2canvas:{scale:2},jsPDF:{unit:"mm",format:"a4",orientation:"landscape"},compressPDF:0}).from(e).toPdf().save()}function printdiv2(){var e=document.getElementById("venc");html2pdf().set({margin:[1,1,1,1],filename:"Vencidas",image:{type:"jpeg",quality:.98},html2canvas:{scale:2},jsPDF:{unit:"mm",format:"a4",orientation:"landscape"},compressPDF:0}).from(e).toPdf().save()}
  </script>
  <script type="text/javascript" src="../js/functions.js"></script>
</footer>