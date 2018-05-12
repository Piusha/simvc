$(document).ready(function(){

    $('.student,.teacher,.parent,.admin').hide();
    $('.student,.teacher,.parent,.admin').children("input[type='text'],select").attr("disabled", "disabled");
    $('#role').change(function(){
        var element = $(this).val();
        $('.student,.teacher,.parent,.admin').hide();
        $('.student,.teacher,.parent,.admin').children("input[type='text'],select").attr("disabled", "disabled");
        $('.student,.teacher,.parent,.admin').children("input[type='text'],select").removeAttr("disabled");
        $('.'+element).show();

    })
});