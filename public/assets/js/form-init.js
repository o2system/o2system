jQuery(document).ready(function($) {
    var iForm = $('form');

    $('[data-action="alias"]').keyup(function () {
        var iValue = $(this).val();
        iValue = iValue.trim().replace(/[^a-zA-Z0-9 ]/g, '');
        iValue = iValue.replace(/\s+/g, '-').toLowerCase();

        iForm.find('[name="alias"]').val(iValue);
    });

    $('[data-action="edit-alias"]').click(function(){
        if($('[name="alias"]').attr('disabled')){
            $('[name="alias"]').removeAttr('disabled');
        } else {
            $('[name="alias"]').attr('disabled', true);
        }
    });

    $(".chosen-select-basic").chosen({
        disable_search: true,
        width: "95%"
    });

    //SELECT2
    $('.select2').select2();

    //SELECT2
    $('.select2-standard').select2({
        minimumResultsForSearch: Infinity
    });

    //SELECT2 MULTIPLE
    $('.select2-multiple').select2();

    //iSwitch
    var elems = Array.prototype.slice.call(document.querySelectorAll('.iswitch'));
    elems.forEach(function(html) {
      var switchery = new Switchery(html, {size: 'small'});
    });
});

