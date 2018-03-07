$(function() {
    $('[data-toggle="tree"]').click(function(){
        if( $(this).hasClass('fa-plus-square-o') ) {
            $(this).removeClass('fa-plus-square-o');
            $(this).addClass('fa-minus-square-o');
        } else {
            $(this).addClass('fa-plus-square-o');
            $(this).removeClass('fa-minus-square-o');
        }
        $(this).closest('tr').siblings('.hidden').eq(0).slideToggle();
    });
});