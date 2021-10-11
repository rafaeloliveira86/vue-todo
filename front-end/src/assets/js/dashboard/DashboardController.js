$(document).ready(function() {

});

//Atualizar Cards
function atualizar() {
    $.post(base_url + '/dashboard/cards', { 'action': 'card_usuarios' }, function(data) {
        $('#card_usuario_ativo').html('<span class="new badge amber darken-2" data-badge-caption="' + data.card_usuarios.total_ativo + '"></span>');
        $('#card_usuario_bloqueado').html('<span class="new badge amber darken-2" data-badge-caption="' + data.card_usuarios.total_bloqueado + '"></span>');
        $('#card_usuario_excluido').html('<span class="new badge amber darken-2" data-badge-caption="' + data.card_usuarios.total_excluido + '"></span>');
        $('#card_usuario_total').html('<span class="new badge amber darken-2" data-badge-caption="' + data.card_usuarios.total + '"></span>');
    }, 'JSON');

    $.post(base_url + '/dashboard/cards', { 'action': 'card_socio_individual' }, function(data) {
        $('#card_socio_individual_ativo').html('<span class="new badge red darken-4" data-badge-caption="' + data.card_socio_individual.total_ativo + '"></span>');
        $('#card_socio_individual_bloqueado').html('<span class="new badge red darken-4" data-badge-caption="' + data.card_socio_individual.total_bloqueado + '"></span>');
        $('#card_socio_individual_excluido').html('<span class="new badge red darken-4" data-badge-caption="' + data.card_socio_individual.total_excluido + '"></span>');
        $('#card_socio_individual_total').html('<span class="new badge red darken-4" data-badge-caption="' + data.card_socio_individual.total + '"></span>');
    }, 'JSON');

    $.post(base_url + '/dashboard/cards', { 'action': 'card_socio_institucional' }, function(data) {
        $('#card_socio_institucional_ativo').html('<span class="new badge indigo darken-4" data-badge-caption="' + data.card_socio_institucional.total_ativo + '"></span>');
        $('#card_socio_institucional_bloqueado').html('<span class="new badge indigo darken-4" data-badge-caption="' + data.card_socio_institucional.total_bloqueado + '"></span>');
        $('#card_socio_institucional_excluido').html('<span class="new badge indigo darken-4" data-badge-caption="' + data.card_socio_institucional.total_excluido + '"></span>');
        $('#card_socio_institucional_total').html('<span class="new badge indigo darken-4" data-badge-caption="' + data.card_socio_institucional.total + '"></span>');
    }, 'JSON');
}
setInterval("atualizar()", 10000);
$(function() {
    atualizar();
});

//Atualizar ChartJS
var loading = [false, false];
var data = new Date();

var label = ["SÓCIO INDIVIDUAL"];
var dataChart = [0];
var meses = document.getElementById('meses');
var ctx = document.getElementById('chart_individual').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: label,
        datasets: [{
            label: 'Quantidade de Sócios Individuais',
            data: dataChart,
            backgroundColor: [
                'rgba(144, 5, 11)',
            ],
            borderColor: [
                'rgba(144, 5, 11)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var label2 = ["SÓCIO INSTITUCIONAL"];
var dataChart2 = [0];
var ctx2 = document.getElementById('chart_institucional').getContext('2d');
var chart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: label2,
        datasets: [{
            label: 'Quantidade de Sócios Institucionais',
            data: dataChart2,
            backgroundColor: [
                'rgb(15, 10, 92)',
            ],
            borderColor: [
                'rgb(15, 10, 92)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

window.addEventListener("load", () => {
    $(document).ready(function() {
        $('.tooltipped').tooltip();
        $('select').formSelect();
        $('.tabs').tabs();
    });
    var mes = data.getMonth() + 1;
    if (mes < 10) {
        mes = "0" + mes;
    }
    meses.value = mes;
    buscar();
});

function buscar() {
    setTimeout(() => {
        loadHttpIndividual();
        loadHttpInstitucional();
    }, 1500)
}

function loadHttpIndividual() {
    var http = new XMLHttpRequest();
    http.open('GET', base_url + '/api/v1/socio/individual/' + meses.value);
    http.send();
    http.onreadystatechange = function(r) {
        if (http.readyState == 4) {
            var result = JSON.parse(http.responseText);
            console.log(result);
            atualizarTabelaIndividual(result);
            atualizarGraficoIndividual(result.length);
        }
    }
}

function loadHttpInstitucional() {
    var http = new XMLHttpRequest();
    http.open('GET', base_url + '/api/v1/socio/institucional/' + meses.value);
    http.send();
    http.onreadystatechange = function(r) {
        if (http.readyState == 4) {
            var result = JSON.parse(http.responseText);
            atualizarTabelaInstitucional(result);
            atualizarGraficoInstitucional(result.length);
        }
    }
}

function atualizarTabelaIndividual(data) {
    var content = "";
    data.forEach((a, b, c) => {
        content +=
            "<tr>" +
            `<td>${a.nome}<br><span class='red-text'>${a.email}</span></td>` +
            `<td>${a.tipo}</td>` +
            `<td>${a.data_cadastro}</td>` +
            "</tr>";
    });
    document.getElementById("tabela_individual").innerHTML = content;
}

function atualizarTabelaInstitucional(data) {
    var content = "";
    data.forEach((a, b, c) => {
        content +=
            "<tr>" +
            `<td>${a.nome}<br><span class='red-text'>${a.email}</span></td>` +
            `<td>${a.tipo}</td>` +
            `<td>${a.data_cadastro}</td>` +
            "</tr>";
    });
    document.getElementById("tabela_institucional").innerHTML = content;
}

function atualizarGraficoIndividual(individual) {
    document.getElementById("qtdSocioIndividual").innerText = individual;
    dataChart[0] = individual;
    chart.data.datasets.forEach((dataset) => {
        dataset.data = dataChart;
    });
    chart.update();
}

function atualizarGraficoInstitucional(institucional) {
    document.getElementById("qtdSocioInstitucional").innerText = institucional;
    dataChart2[0] = institucional;
    chart2.data.datasets.forEach((dataset) => {
        dataset.data = dataChart2;
    });
    chart2.update();
}