$(document).ready(function() {
    $('#fecha').datetimepicker({
        format: 'DD - MM - YYYY',
        locale: 'es',
        useCurrent: false,
        autoclose: true,
        icons: { close: 'fa fa-times' }
    });

    $('#hora').datetimepicker({
        format: 'LT',
        locale: 'es'
    });

    $('#clearFecha').on('click', function() {
        $('#fecha').datetimepicker('clear');
    });
    
    $('#clearHora').on('click', function() {
        $('#hora').datetimepicker('clear');
    });
});
