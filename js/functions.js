function showCustomer(e) {
    if ("" != e) {
        const n = new XMLHttpRequest;
        n.onload = function () {
            document.getElementById("txt").innerHTML = this.responseText
        }, n.open("GET", "./HelpDesk/abertura/consulta_patrimonio.php?q=" + e), n.send()
    } else document.getElementById("txt").innerHTML = ""
}

function showCustomer1(e) {
    if ("" != e) {
        const n = new XMLHttpRequest;
        n.onload = function () {
            document.getElementById("txt1").innerHTML = this.responseText
        }, n.open("GET", "./HelpDesk/adm/manutencao/chamado.php?q1=" + e), n.send()
    } else document.getElementById("txt1").innerHTML = ""
}

function gera_calendario(e, n) {
    if ("" != e) {
        const t = new XMLHttpRequest;
        t.onload = function () {
            document.getElementById("calendario").innerHTML = this.responseText
        }, t.open("GET", "./HelpDesk/adm/manutencao/calendario.php?q1=" + e + "&tipo=" + n), t.send()
    } else document.getElementById("calendario").innerHTML = ""
}

function table_equi(id) {
    const e = new XMLHttpRequest;
    e.onload = function () {
        document.getElementById("tabela").innerHTML = this.responseText
    }, e.open("GET", "./HelpDesk/table/tableequi.php?id="+id), e.send()
}

function table_insu(id) {
    const e = new XMLHttpRequest;
    e.onload = function () {
        document.getElementById("tabela").innerHTML = this.responseText
    }, e.open("GET", "./HelpDesk/table/tableinsu.php?id="+id), e.send()
}

function recarregar() {
    location.reload()
}

function calcula() {
    var e = document.getElementById("quantidade").value * document.getElementById("valor").value;
    document.getElementById("total").value = parseFloat(e)
}