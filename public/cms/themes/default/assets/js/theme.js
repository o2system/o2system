$(document).ready(function(){
    var scroll_start = 0;
    var startchange = $('#main-content');
    var offset = startchange.offset();
    if (startchange.length){
        $(document).scroll(function() {
            scroll_start = $(this).scrollTop();
            if(scroll_start > offset.top) {
                $('#main-navigation').addClass('bg-primary').removeClass('bg-transparent');
            } else {
                $('#main-navigation').addClass('bg-transparent').removeClass('bg-primary');
            }
        });
    }

    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
});