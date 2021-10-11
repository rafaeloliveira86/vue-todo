$(document).ready(function() {
    //Materialize
    $('.tooltipped').tooltip();
    $('.modal').modal();
    $('.dropdown-trigger').dropdown();
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('select').formSelect();
    $('.tabs').tabs();
    $('.collapsible').collapsible();
    $('.datepicker').datepicker({
        yearRange: 100,
        firstDay: true,
        format: 'dd/mm/yyyy',
        i18n: {
            cancel: 'Cancelar',
            clear: 'Limpar',
            done: 'Ok',
            previousMonth: '‹',
            nextMonth: '›',
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            weekdays: ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'],
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
            weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S']
        }
    });
});

$(function() {
    if ($("#valor_anuidade").length > 0) {
        $("#valor_anuidade").maskMoney({
            symbol: 'R$ ',
            showSymbol: false,
            thousands: '.',
            decimal: ',',
            symbolStay: true
        });
    }
});